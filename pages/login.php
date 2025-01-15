<?php 
include '../includes/header.php';
require_once '../config.php';
require_once '../dbconnection.php';

// Fehlermeldung aus der Session lesen und danach entfernen
$error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
unset($_SESSION['login_error']); // Fehlermeldung löschen
?>

<div class="login-container">
    <form class="login-form" method="POST" action="../logic/login.handler.php">
        <h1>Login</h1>

        <?php if (!empty($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>

        <div class="form-group">
            <label for="username">Benutzername</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Passwort</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button class="login-button">Einloggen</button>
        <p class="register-link">Noch kein Konto? <a href="../pages/register.php">Registrieren</a></p>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
