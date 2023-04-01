<?php
require_once 'inc/manager-db.php';
$id = $_GET['id'];
$pays = getCapital($id);
//$pays = getUpdate($id);
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
						<link rel="stylesheet" type="text/css" href="misePage/styleForm.css">

						<!--  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<link rel="stylesheet" href="datepicker.css" />  -->

						<script type="text/javascript">
							$(function () {
								$('#datenaiss,#dateembauche').datepicker({
									inline: true,
									showOtherMonths: true,
									changeMonth: true,
									changeYear: true,
									yearRange: "-100:+0",
									maxDate: '0',
									dateFormat: 'yy-mm-dd',
									dayNamesMin: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
									monthNames: ['Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao&ucirc;t', 'Septembre', 'Octobre', 'Novembre', 'D&eacute;cembre'],
									minDate: '-100Y',
								});
							});
						</script>

						<div style="text-align:center">
							<button onclick="window.location.href = 'index.php';">Accueil</button>
							<h2>Mettre à jour son profil</h2>
						</div>
</head>
<hr>
<form method="post" action="index.php">
	Id : <input type="text" name="id" value="<?php echo $pays->id ?> "><br>
	Code : <input type="text" name="code" value="<?php echo $pays->code ?> "><br>
	Name : <input type="text" id="datenaiss" name="name" value="<?php echo $pays->name ?> "><br>
	Continent : <input type="text" id="datenaiss" name="continent" value="<?php echo $pays->continent ?> "><br>
	Region : <input type="text" id="datenaiss" name="region" value="<?php echo $pays->region ?> "><br>
	<input type="hidden" name="id" value="<?php echo $pays->id ?> "><br>
	<input type="submit" name="update" value="Insérer">
</form>

</html>