<?php
session_start(); // Session starten

// Überprüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Falls nicht eingeloggt, zurück zur Login-Seite
    exit();
}
$title = "Willkommen-Seite";
include '../includes/header.php';
include '../includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Willkommen</title>
    <link rel="stylesheet" href="../res/css/style.css">
</head>
<body>
    <div class="welcome-container">
        <h1>Willkommen, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>Sie sind erfolgreich eingeloggt.</p>
        <div class="welcome-actions">
            <a href="profile.php" class="action-button">Profil ansehen</a>
            <a href="reserve.php" class="action-button2">Zimmer reservieren</a>
            <a href="logout.php" class="action-button logout-button">Logout</a>
        </div>
    </div>
</body>
</html>
<?php include '../includes/footer.php'; ?>