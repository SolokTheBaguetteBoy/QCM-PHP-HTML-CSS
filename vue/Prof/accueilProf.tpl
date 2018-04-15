	<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<!-- <title>authentification - 2 fichiers</title> -->
		<link rel="stylesheet" href="vue/styleCSS/styleAccueilPerso.css">
		<?php require ("modele/ProfBD.php") ; ?>
	</head>
	<body>
		<div class="intro" id="bienvenue">
			<h1 class="titre">Bienvenue</br>P. <?php echo($_SESSION['profil']['prenom']." ".$_SESSION['profil']['nom']);?>
			</h1>
		</div>
	</body>
</html>

	