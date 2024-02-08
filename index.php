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

<div class="container mt-5">
    <!-- Login Form -->
    <div id="loginForm">
        <!-- Login Success Alert -->
<div class="alert alert-success" role="alert" style="display: none;" id="loginSuccess">
  Vous êtes connecté - You are connected.
</div>

<!-- Login Error Alert -->
<div class="alert alert-danger" role="alert" style="display: none;" id="loginError">
  Erreur. Recommencez - Error. Try again.
</div>

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

    <!-- Registration Success Alert -->
<div class="alert alert-success" role="alert" style="display: none;" id="registrationSuccess">
  Ajout d'un compte - Account added.
</div>

<!-- Registration Error Alert -->
<div class="alert alert-danger" role="alert" style="display: none;" id="registrationError">
  Erreur. Recommencez - Error. Try again.
</div>

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
                <label for="newUsername">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
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


</body>
</html>
