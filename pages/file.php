<?php
session_start(); // Session starten

// Überprüfen, ob der Benutzer eingeloggt ist
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Falls nicht eingeloggt, zurück zur Login-Seite
    exit();
}

$title = "Profilbild verwalten";
include '../includes/header.php'; // Header einbinden
include '../includes/navbar.php'; // Navbar einbinden

// Profilbild aus Session abrufen (falls bereits hochgeladen)
$profilePic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : "../res/images/default-user.png";

// Profilbild löschen, wenn der Benutzer auf "Löschen" klickt
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    if (isset($_SESSION['profile_pic']) && file_exists($_SESSION['profile_pic'])) {
        unlink($_SESSION['profile_pic']); // Datei vom Server löschen
        unset($_SESSION['profile_pic']); // Session-Variable entfernen
    }
    header("Refresh:0"); // Seite neu laden, um Änderungen zu reflektieren
    exit();
}

// Profilbild hochladen, wenn der Benutzer auf "Hochladen" klickt
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
    $file = $_FILES['profile_pic'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "<p>Fehler beim Hochladen der Datei.</p>";
        exit();
    }

    // Bildgröße prüfen
    list($width, $height) = getimagesize($file['tmp_name']);
    if ($width < 150 || $height < 150) {
        echo "<p>Das Bild ist zu klein. Bitte lade ein Bild hoch, das mindestens 150x150 Pixel groß ist.</p>";
        exit();
    }

    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file['type'], $allowedMimeTypes)) {
        echo "<p>Nur JPEG, PNG und GIF sind erlaubt.</p>";
        exit();
    }

    $uploadDir = '../uploads/profile_pics/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $uniqueFileName = uniqid('profile_', true) . '.' . $extension;

    $uploadPath = $uploadDir . $uniqueFileName;
    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        // Vorheriges Profilbild löschen, falls vorhanden
        if (isset($_SESSION['profile_pic']) && file_exists($_SESSION['profile_pic'])) {
            unlink($_SESSION['profile_pic']);
        }
        // Neues Profilbild in der Session speichern
        $_SESSION['profile_pic'] = $uploadPath;

        echo "<p>Profilbild erfolgreich hochgeladen!</p>";
    } else {
        echo "<p>Fehler beim Speichern der Datei.</p>";
    }
    header("Refresh:0"); // Seite neu laden, um das neue Bild zu sehen
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../res/css/style.css">
</head>
<body>
<div class="profile-container">
    <h1>Profilbild verwalten</h1>

    <!-- Profilbild anzeigen -->
    <div class="profile-pic">
        <img id="profile-preview" src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profilbild">
    </div>

    <!-- Upload-Formular -->
    <form enctype="multipart/form-data" method="post">
        <label for="file-upload" class="custom-file-upload">Neues Profilbild auswählen</label>
        <input id="file-upload" type="file" name="profile_pic" accept="image/*" onchange="previewFile(event)">
        <button type="submit">Hochladen</button>
    </form>

    <!-- Löschen-Button -->
    <?php if (isset($_SESSION['profile_pic'])): ?>
        <form method="post">
            <button type="submit" name="delete" class="delete-button">Profilbild löschen</button>
        </form>
    <?php endif; ?>
</div>

<script>
    // Funktion zur Vorschau des hochgeladenen Bildes
    function previewFile(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('profile-preview');
        const reader = new FileReader();

        if (file) {
            reader.onload = function (e) {
                preview.src = e.target.result; // Vorschau aktualisieren
            };
            reader.readAsDataURL(file);
        }
    }
</script>

</body>
</html>




<?php include '../includes/footer.php'; // Footer einbinden ?>
