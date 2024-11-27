<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar">
        <ul class="nav-links">
            <li><a href="../pages/index.php">Startseite</a></li>
            <li><a href="../pages/hilfe.php">Hilfe</a></li>
            <li><a href="../pages/legalnotice.php">Über uns</a></li>
                <?php if (isset($_SESSION['username'])): ?>
            <li><a href="../pages/profile.php">Profil</a></li>
            <li><a href="../pages/logout.php">Log out</a></li>
                <?php else: ?>
            <li><a href="../pages/login.php">Log in</a></li>
                <?php endif; ?>
        </ul>
</nav>