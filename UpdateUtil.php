<?php
require_once('inc\manager-db.php');
$id = $_GET['id'];
$utilisateur = getUtilisateur($id);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<div class="form-body">
		<div class="row">
			<div class="form-holder">
				<div class="form-content">
					<div class="form-items">
						<link rel="stylesheet" type="text/css" href="misePage\styleForm.css">

						<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
						<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
						<link rel="stylesheet" href="datepicker.css" />

						<div style="text-align:center">
							<button onclick="window.location.href = 'listeEleves.php';">Accueil</button>
							<h2>Mettre à jour le profil</h2>
						</div>

						<form method="post" action="listeEleves.php">
							Login : <input type="text" name="login" value="<?php echo $utilisateur->login ?> "><br>
							Mot de passe : <input type="text" name="password"
								value="<?php echo $utilisateur->password ?> "><br>
							<div value="<?php echo $utilisateur->role ?> ">
								<label FOR="name">role:</label>
								<select id="name" name="role">
									<option name="role" value="Enseignant">Enseignant</option>
									<option name="role" value="Eleve">Eleve</option>
									<option name="role" value="Lambda">lambda</option>
									<option name="role" value="Admin">Admin</option>
								</select>
							</div>
							<input type="hidden" name="id" value="<?php echo $utilisateur->id ?> "><br>
							<input type="submit" name="update" value="Mettre à jour">
						</form>