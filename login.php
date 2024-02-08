<?php
session_start();
$db = new mysqli('localhost', 'root', 'root', 'ca');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $db->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            // Redirect to a protected page
            header("Location: success.php");
            exit();
        } else {
            // Set error message in session and redirect to login
            $_SESSION['login_error'] = "Invalid username or password.";
            header("Location: index.php"); // Assuming your login form is index.php
            exit();
        }
    } else {
        // Set error message in session and redirect to login
        $_SESSION['login_error'] = "Invalid username or password.";
        header("Location: index.php"); // Assuming your login form is index.php
        exit();
    }
}
?>
