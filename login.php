<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Log in Seite</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>
    <nav class="navbar">
        <ul class="nav-links">
            <li><a href="index.php">Startseite</a></li>
            <li><a href="hilfe.html">Hilfe</a></li>
            <li><a href="legalnotice.html">Über uns</a></li>
            <li><a href="login.html">Log in</a></li>
        </ul>
    </nav>

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

    <footer class="footer">
        <p>&copy; 2024 Dings Hotel. Alle Rechte vorbehalten.</p>
    </footer>

</body>

</html>