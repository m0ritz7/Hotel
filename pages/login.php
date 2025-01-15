<?php 
include '../includes/header.php';
require_once '../config.php';
require_once '../dbconnection.php';
?>


<div class="login-container">
    <form class="login-form" method="POST" action="../logic/login.handler.php">
        <h1>Login</h1>

        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <div class="form-group">
            <label for="username">Username</label>
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