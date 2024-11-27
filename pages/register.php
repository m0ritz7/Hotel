<?php
$title = "Registrieren-Seite";
include '../includes/header.php';
include '../includes/navbar.php';
?>

<div class="register-container">
    <h1>Registrieren</h1>
    <form method="POST" action="register-handler.php">
        <!-- Anrede -->
        <div class="mb-3">
            <label for="anrede" class="form-label">Anrede</label>
            <select class="form-select" id="anrede" name="anrede" required>
                <option value="">Bitte auswählen</option>
                <option value="Herr">Herr</option>
                <option value="Frau">Frau</option>
                <option value="Divers">Divers</option>
            </select>
        </div>

        <!-- Vorname -->
        <div class="mb-3">
            <label for="firstname" class="form-label">Vorname</label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Max" required>
        </div>

        <!-- Nachname -->
        <div class="mb-3">
            <label for="lastname" class="form-label">Nachname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Mustermann" required>
        </div>

        <!-- Geburtsdatum -->
        <div class="mb-3">
            <label for="birthday" class="form-label">Geburtsdatum</label>
            <input type="date" class="form-control" id="birthday" name="birthday" required>
        </div>

        <!-- Straße -->
        <div class="mb-3">
            <label for="street" class="form-label">Straße</label>
            <input type="text" class="form-control" id="street" name="street" placeholder="Musterstraße" required>
        </div>

        <!-- Hausnummer -->
        <div class="mb-3">
            <label for="housenumber" class="form-label">Hausnummer</label>
            <input type="number" class="form-control" id="housenumber" name="housenumber" placeholder="1" required>
        </div>

        <!-- PLZ -->
        <div class="mb-3">
            <label for="zip" class="form-label">PLZ</label>
            <input type="number" class="form-control" id="zip" name="zip" placeholder="12345" required>
        </div>

        <!-- Ort -->
        <div class="mb-3">
            <label for="city" class="form-label">Ort</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Musterstadt" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
        </div>

        <!-- Username -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>

        <!-- Passwort -->
        <div class="mb-3">
            <label for="password" class="form-label">Passwort</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <!-- Passwort wiederholen -->
        <div class="mb-3">
            <label for="confirm-password" class="form-label">Passwort wiederholen</label>
            <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
        </div>

        <!-- Submit-Button -->
        <button type="submit" class="btn btn-primary">Jetzt Registrieren</button>
    </form>
</div>
