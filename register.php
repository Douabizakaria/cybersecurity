<?php
session_start(); // Don't forget to start the session
$db = new mysqli('localhost', 'root', 'root', 'ca');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $db->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($db->query($query)) {
        // Set success message in session and redirect to login
        $_SESSION['registration_success'] = "Registration successful.";
        header("Location: index.php"); // Redirect to login page after registration
        exit();
    } else {
        // Set error message in session and redirect to registration
        $_SESSION['registration_error'] = "User could not be registered. Maybe the username is already taken.";
        header("Location: register.php"); // Redirect back to the registration page
        exit();
    }
}
?>
