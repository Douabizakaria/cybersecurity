<?php
session_start();
$db = new mysqli('localhost', 'root', 'root', 'ca');

// Define your lockout criteria
$max_attempts = 5; // Maximum failed attempts
$lockout_time = 15; // Lockout period in minutes

// User's IP address
$ip_address = $_SERVER['REMOTE_ADDR'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // First, check for existing failed login attempts
    $stmt = $db->prepare("SELECT COUNT(*) AS failure_count FROM failed_login_attempts WHERE ip_address = ? AND attempt_time > NOW() - INTERVAL ? MINUTE");
    $stmt->bind_param("si", $ip_address, $lockout_time);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    if ($result['failure_count'] >= $max_attempts) {
        $_SESSION['alert'] = 'lockout';
        header("Location: index.php");
        exit();
    }
    
    $username = $db->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Successful login, reset failed attempts
            $stmt = $db->prepare("DELETE FROM failed_login_attempts WHERE ip_address = ?");
            $stmt->bind_param("s", $ip_address);
            $stmt->execute();

            $_SESSION['username'] = $user['username'];
            $_SESSION['alert'] = 'loginSuccess';
            header("Location: success.php");
            exit();
        } else {
            // Log the failed login attempt
            $stmt = $db->prepare("INSERT INTO failed_login_attempts (ip_address) VALUES (?)");
            $stmt->bind_param("s", $ip_address);
            $stmt->execute();

            $_SESSION['alert'] = 'loginError';
            header("Location: index.php");
            exit();
        }
    } else {
        // Username does not exist, log the failed login attempt
        $stmt = $db->prepare("INSERT INTO failed_login_attempts (ip_address) VALUES (?)");
        $stmt->bind_param("s", $ip_address);
        $stmt->execute();

        $_SESSION['alert'] = 'loginError';
        header("Location: index.php");
        exit();
    }
}
?>
