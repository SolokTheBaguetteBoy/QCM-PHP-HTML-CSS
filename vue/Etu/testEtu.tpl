	<!doctype html>
	<link rel="stylesheet" href="vue/styleCSS/styleAccueilPerso.css">
	<?php require "./modele/testEtu.php"; ?>
	<?php require "./modele/EtuBD.php"; ?>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Test côté étudiant</title>
		<!-- 	<link rel="stylesheet" href="style.css">
			<script src="script.js"></script>
			
		-->

	</head>
	<body>
	<div class="panel-group panelContent">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1>Accue<vert>i</vert>l test</h1>
					</div>
					<div class="panel-body">
					<?php $idtest = $_GET['test'];
						$nextiirl = "<form method=\"post\" action=\"index.php?controle=utilisateur&action=qcmEtu&test=" . $_GET['test'] . "\">";
						
						echo $nextiirl;?>

							<!-- <div class="row"> -->
								<!-- <p> -->
								<!-- <font color="white">.--</font>On insèrera ici les éléments de notre formulaire. -->
								<!-- </p> -->
							<!-- </div> -->
							<!-- <input type="text" name="prenom" /> -->
							<!-- <input type="submit" value="Valider" /> -->
						
						<?php 
						Form_Test($_GET['test']) ;?>

						<input type="submit" class="btn" value="Valider" />
						
						<!--<input type="text">-->
						</form>
					</div>	
				</div>
			</div>	
	</body>
</html>