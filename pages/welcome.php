<?php

require_once '../config.php';
include '../includes/header.php';

// Überprüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['username'])) {
    header("Location: pages/login.php"); // Falls nicht eingeloggt, zurück zur Login-Seite
    exit();
}
?>

    <title>Willkommen</title>
<body>
    <div class="welcome-container">
        <h1>Willkommen, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Sie sind erfolgreich eingeloggt.</p>
        <div class="welcome-actions">
            <a href="profile.php" class="action-button">Profil ansehen</a>
            <a href="reserve.php" class="action-button2">Zimmer reservieren</a>
            <a href="upload.php" class="action-button2">Dateien hochladen</a>
            <a href="logout.php" class="action-button logout-button">Logout</a>
        </div>
    </div>
</body>
</html>
<?php include '../includes/footer.php'; ?>