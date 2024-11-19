<?php
$title = "Login-Seite";
include '../includes/header.php';
include '../includes/navbar.php';
?>

    <div class="login-container">
        <form class="login-form">
            <h1>Login</h1>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Passwort</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="login-button">Einloggen</button>
            <p class="register-link">Noch kein Konto? <a href="register.html">Registrieren</a></p>
        </form>
    </div>

<?php include '../includes/footer.php'; ?>