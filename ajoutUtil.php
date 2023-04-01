<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <link rel="stylesheet" href="misePage\styleForm.css" />
</head>
<form id="contactform" action="index.php" method="POST">

    <div style="text-align:center">
        <button onclick="window.location.href = 'listeSalariesPDO.php';">Accueil</button>
        <h2>Création du compte</h2>
    </div>
    <div>
        <label for="name">login :</label>
        <input placeholder="Votre nom" type="text" id="name" name="login">
    </div>
    <div>
        <label for="name">Mot de passe :</label>
        <input type="password" placeholder="Mot de passe" type="text" id="name" name="password">
    </div>
    <div>
        <label FOR="name">Role:</label>
        <select id="name" name="role">
            <option name="role" value="Lambda">Lambda</option>
            <?php
            global $pdo;
            require_once('inc\manager-db.php');
            session_start();
            if (($_SESSION['role'] == 'Admin') || ($_SESSION['role'] == 'Enseignant')): ?>
                <option name="role" value="Eleve">Eleve</option>
                <option name="role" value="Enseignant">Enseignant</option>
            <?php endif; ?>
        </select>
    </div>
    <div style="text-align:center;" class="button" class="div1">
        <input type="submit" value="Ajouter utilisateur" name="ajout">
        <input type="reset" VALUE="Annuler">
    </div>
</form>