<?php
session_start(); // Don't forget to start the session
$db = new mysqli('localhost', 'root', 'root', 'ca');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $db->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($db->query($query)) {
        $_SESSION['alert'] = 'registrationSuccess';
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['alert'] = 'registrationError';
        header("Location: index.php");
        exit();
    }
}
?>
