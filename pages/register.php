<?php
$title = "Registrieren-Seite";
include '../includes/header.php';
include '../includes/navbar.php';
?>
    <p>
    <h1>Registrieren</h1>
    </p>

    <div class="register-container">
    <form>

    <form method="POST">
        <div class="mb-3">
            <select class="form-select" required aria-label="select example">
                <option value="">Anrede</option>
                <option value="1">Herr</option>
                <option value="2">Frau</option>
                <option value="3">Divers</option>
            </select>
        <div class="invalid-feedback">Example invalid select feedback</div>
        </div>

  <form method="POST">
        <div class="mb-3">
            <label for="firstname" class="form-label">Vorname</label>
            <input 
                class="form-control<?php if (isset($formError['firstname'])) print('is-invalid'); else print('is-valid'); ?>"
                id="firstname" 
                type="text"
                name="firstname" 
                value="<?php if (isset($formData)) print($formData['firstname']) ?>" 
                placeholder="Max" required>
            <?php
                if (isset($formError['firstname'])) {
                    print('<div class="invalid-feedback">');
                    print($formError['firstname']);
                    print('</div>');
                }
            ?>
        </div>

    <form method="POST">
        <div class="mb-3">
            <label for="lastname" class="form-label">Name</label>
            <input 
                class="form-control <?php if (isset($formError['lastname'])) print('is-invalid'); else print('is-valid'); ?>"
                id="lastname"
                type="text"
                name="lastname" 
                value="<?php if (isset($formData)) print($formData['lastname']) ?>" 
                placeholder="Mustermann" required>
            <?php
                if (isset($formError['lastname'])) {
                    print('<div class="invalid-feedback">');
                    print($formError['lastname']);
                    print('</div>');
                }
            ?>
        </div>

    <form method="POST">
        <div class="mb-3">
            <label for="birthday" class="form-label">Geburtsdatum</label>
            <input
            type="date"
            class="form-control <?php if (isset($formError['Geburtsdatum'])) print('is-invalid'); else print('is-valid'); ?>"
            id="birthday"
            name="Geburtsdatum"
            value="<?php if (isset($formData['Geburtsdatum'])) print($formData['Geburtsdatum']); ?>"
            required>
            <?php
                if (isset($formError['Geburtsdatum'])) {
                    print('<div class="invalid-feedback">');
                    print($formError['Geburtsdatum']);
                    print('</div>');
                }
            ?>

    <form method="POST">
        <div class="mb-3">
            <label for="street" class="form-label">Straße</label>
            <input
            type="text"
            class="form-control <?php if (isset($formError['street'])) print('is-invalid'); else print('is-valid'); ?>"
            id="birthday"
            name="street"
            value="<?php if (isset($formData['street'])) print($formData['street']); ?>"
            placeholder="Musterstraße" required>
            <?php
                if (isset($formError['street'])) {
                    print('<div class="invalid-feedback">');
                    print($formError['street']);
                    print('</div>');
                }
            ?>
               
        </div>

    <form method="POST">
        <div class="mb-3">
            <label for="housenumber" class="form-label">Hausnummer</label>
            <input
            type="number"
            class="form-control <?php if (isset($formError['housenumber'])) print('is-invalid'); else print('is-valid'); ?>"
            id="housenumber"
            name="housenumber"
            value="<?php if (isset($formData['housenumber'])) print($formData['housenumber']); ?>"
            placeholder="1" required>
            <?php
                if (isset($formError['housenumber'])) {
                    print('<div class="invalid-feedback">');
                    print($formError['housenumber']);
                    print('</div>');
                }
            ?>
            
        </div>

    <form method="POST">
        <div class="mb-3">
            <label for="zip" class="form-label">PLZ</label>
            <input
            type="number"
            class="form-control <?php if (isset($formError['zip'])) print('is-invalid'); else print('is-valid'); ?>"
            id="zip"
            name="zip"
            value="<?php if (isset($formData['zip'])) print($formData['zip']); ?>"
            placeholder="1000" required>
            <?php
                if (isset($formError['zip'])) {
                    print('<div class="invalid-feedback">');
                    print($formError['zip']);
                    print('</div>');
                }
            ?>
            
        </div>

    <form method="POST">
        <div class="mb-3">
            <label for="city" class="form-label">Ort</label>
            <input
            type="text"
            class="form-control <?php if (isset($formError['city'])) print('is-invalid'); else print('is-valid'); ?>"
            id="city"
            name="city"
            value="<?php if (isset($formData['city'])) print($formData['city']); ?>"
            placeholder="Musterstadt" required>
            <?php
                if (isset($formError['city'])) {
                    print('<div class="invalid-feedback">');
                    print($formError['city']);
                    print('</div>');
                }
            ?>
            
        </div>
    
    <form method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email" 
                value="<?php if(isset($formData)) print($formData['email']) ?>" 
                placeholder="name@example.com" required>
                <?php
                if (isset($formError['name'])) {
                    print('<div class="invalid-feedback">');
                    print($formError['name']);
                    print('</div>');
                }
            ?>
        </div>

    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input
            type="text"
            class="form-control <?php if (isset($formError['username'])) print('is-invalid'); else print('is-valid'); ?>"
            id="birthday"
            name="street"
            value="<?php if (isset($formData['street'])) print($formData['street']); ?>"
            placeholder="Username" required>
            <?php
                if (isset($formError['street'])) {
                    print('<div class="invalid-feedback">');
                    print($formError['street']);
                    print('</div>');
                }
            ?>
               
        </div>

    <form method="POST">
        <div class="mb-3">
            <label for="password" class="form-label">Passwort</label>
            <input 
                class="form-control <?php if (isset($formError['password'])) print('is-invalid'); else print('is-valid'); ?>"
                id="password"
                type="text"
                name="password" 
                value="<?php if (isset($formData)) print($formData['password']) ?>" 
                required>
            <?php
                if (isset($formError['password'])) {
                    print('<div class="invalid-feedback">');
                    print($formError['password']);
                    print('</div>');
                }
            ?>
        </div>

    <form method="POST">
        <div class="mb-3">
            <label for="password" class="form-label">Passwort wiederholen</label>
            <input 
                class="form-control <?php if (isset($formError['password'])) print('is-invalid'); else print('is-valid'); ?>"
                id="password"
                type="text"
                name="password" 
                value="<?php if (isset($formData)) print($formData['password']) ?>" 
                required>
            <?php
                if (isset($formError['password'])) {
                    print('<div class="invalid-feedback">');
                    print($formError['password']);
                    print('</div>');
                }
            ?>
        </div>


        <button type="submit" class="btn btn-primary">Jetzt Registrieren</button>

    </form>
    </div>

