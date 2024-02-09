<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="script.js"></script>
</head>
<body>

<?php session_start(); ?>

<div class="container mt-5">
    <!-- Login Form -->
    <div id="loginForm">

        <!-- Alerts -->
        <?php if(isset($_SESSION['alert']) && $_SESSION['alert'] === 'loginSuccess'): ?>
            <div class="alert alert-success" role="alert">
                Vous êtes connecté - You are connected.
            </div>
        <?php elseif(isset($_SESSION['alert']) && $_SESSION['alert'] === 'loginError'): ?>
            <div class="alert alert-danger" role="alert">
                Erreur. Recommencez - Error. Try again.
            </div>
        <?php endif; ?>

        <form action="login.php" method="post" class="border p-4 bg-light">
        <div class="col-12 text-center">
            <img src="logo.png" alt="Logo" class="mb-4" style="width: 150px;"> <!-- Update the src with your logo path -->
        </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group text-center">
                <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset</button>
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
        <div class="text-center">
            <button class="btn btn-link" onclick="toggleForms()">Register</button>
        </div>
    </div>

    <!-- Registration Form -->
    <div id="registrationForm" style="display:none;">

        <!-- Alerts -->
        <?php if(isset($_SESSION['alert']) && $_SESSION['alert'] === 'registrationSuccess'): ?>
            <div class="alert alert-success" role="alert">
                Ajout d'un compte - Account added.
            </div>
        <?php elseif(isset($_SESSION['alert']) && $_SESSION['alert'] === 'registrationError'): ?>
            <div class="alert alert-danger" role="alert">
                Erreur. Recommencez - Error. Try again.
            </div>
        <?php endif; ?>

        <h2 class="text-center">Register</h2>
        
        <form action="register.php" method="post" class="border p-4 bg-light">
        <div class="col-12 text-center">
            <img src="logo.png" alt="Logo" class="mb-4" style="width: 150px;"> <!-- Update the src with your logo path -->
        </div>
            <div class="form-group">
                <label for="newUsername">Username:</label>
                <input type="text" class="form-control" id="newUsername" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="newPassword">Password:</label>
                <input type="password" class="form-control" id="newPassword" name="password" required>
            </div>
            
            <div class="form-group text-center">
                <button type="button" class="btn btn-secondary" onclick="resetForm()">Reset</button>
                <input type="submit" class="btn btn-primary" value="Register">
            </div>
        </form>
        <div class="text-center">
            <button class="btn btn-link" onclick="toggleForms()">Login</button>
</div>
</div>

</div>
<!-- Include Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Clear PHP session alert variable -->
<?php if(isset($_SESSION['alert'])) { unset($_SESSION['alert']); } ?>
</body>
</html>
