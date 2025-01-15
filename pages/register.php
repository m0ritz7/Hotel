<?php
require_once '../config.php';
include '../includes/header.php';
include '../dbconnection.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<p>
<h1>Registrieren</h1>
</p>

<div class="register-container">    
        <form action="../logic/register.handler.php" method="POST">
        <div class="mb-3">
                <label for="salutation">Anrede</label>
                <select class="form-select" name="salutation" id="salutation" required aria-label="select example">
                    <option value="Herr">Herr</option>
                    <option value="Frau">Frau</option>
                    <option value="Divers">Divers</option>
                </select>
                <div class="invalid-feedback">Example invalid select feedback</div>
            </div>

            <div class="mb-3">
                <label for="firstname" class="form-label">Vorname</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Max" required>
            </div>


            <div class="mb-3">
                <label for="lastname" class="form-label">Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Mustermann" required>
            </div>


            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>


            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username"  name="username" placeholder="Username" required>
            </div>


            <div class="mb-3">
                <label for="password" class="form-label">Passwort</label>
                <input type="text" class="form-control" id="password" name="password" required>
            </div>


            <div class="mb-3">
                <label for="password2" class="form-label">Passwort
                    wiederholen</label>
                <input type="text" class="form-control" id="password2" name="password2" required>
            </div>


            <button type="submit" class="btn btn-primary">Jetzt Registrieren</button>

        </form>
</div>