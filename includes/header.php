<link rel="stylesheet" href="../css/style.css" content="width=device-width, initial scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


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