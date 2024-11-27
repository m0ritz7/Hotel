<?php
session_start(); // Session starten

// Überprüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Falls nicht eingeloggt, zurück zur Login-Seite
    exit();
}

// Statische Benutzerdaten (für Testzwecke, später durch DB ersetzt)
$userData = [
    'username' => $_SESSION['username'],
    'email' => 'example@example.com',
    'fullName' => 'Max Mustermann'
];

// Fehler- und Erfolgsmeldungen
$error = $success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateProfile'])) {
        // Profil bearbeiten
        $userData['email'] = htmlspecialchars($_POST['email']);
        $userData['fullName'] = htmlspecialchars($_POST['fullName']);
        $success = "Stammdaten wurden erfolgreich aktualisiert.";
    } elseif (isset($_POST['changePassword'])) {
        // Passwort ändern
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        // Prüfung des alten Passworts (statisch für Testzwecke)
        $currentPassword = 'test123'; // Statisches Passwort für Test

        if ($oldPassword !== $currentPassword) {
            $error = "Das alte Passwort ist nicht korrekt.";
        } elseif ($newPassword !== $confirmPassword) {
            $error = "Die neuen Passwörter stimmen nicht überein.";
        } else {
            $success = "Passwort wurde erfolgreich geändert.";
        }
    }
}

$title = "Profilverwaltung";
include '../includes/header.php';
include '../includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilverwaltung</title>
    <link rel="stylesheet" href="../res/css/style.css">
</head>
<body>
    <div class="profile-container">
        <h1>Willkommen, <?php echo htmlspecialchars($userData['username']); ?>!</h1>

        <?php if ($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="success-message"><?php echo $success; ?></div>
        <?php endif; ?>

        <!-- Stammdaten bearbeiten -->
        <div class="profile-section">
            <h2>Stammdaten bearbeiten</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="fullName">Vollständiger Name</label>
                    <input type="text" id="fullName" name="fullName" value="<?php echo htmlspecialchars($userData['fullName']); ?>" required>
                </div>
                <button type="submit" name="updateProfile" class="action-button">Aktualisieren</button>
            </form>
        </div>

        <!-- Passwort ändern -->
        <div class="profile-section">
            <h2>Passwort ändern</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="oldPassword">Altes Passwort</label>
                    <input type="password" id="oldPassword" name="oldPassword" required>
                </div>
                <div class="form-group">
                    <label for="newPassword">Neues Passwort</label>
                    <input type="password" id="newPassword" name="newPassword" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Neues Passwort bestätigen</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
                <button type="submit" name="changePassword" class="action-button">Passwort ändern</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php include '../includes/footer.php'; ?>
