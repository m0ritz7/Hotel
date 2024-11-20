<?php
require_once '../config.php';

$title = "Login-Seite";
include '../includes/header.php';
include '../includes/navbar.php';

$valid_username = "testuser";
$valid_password = "123456";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Ungültiger Benutzername oder Passwort!";
    }
}

?>

    <div class="login-container">
        <form class="login-form" method="POST" action="">
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