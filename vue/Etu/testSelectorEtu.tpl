	<!doctype html>
	<link rel="stylesheet" href="vue/styleCSS/styleAccueilPerso.css">
	<?php require "./modele/testSelectorEtu.php"; ?>
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
						<h1>Select<vert>i</vert>on du test</h1>
					</div>
					<div class="panel-body">
						<?php $tests = getTests($_SESSION['profil']['id_etu']); 
						
						for($i = 0; $i < sizeof($tests) ; $i++){
							$nextirl = "index.php?controle=utilisateur&action=qcmEtuV2&test=" . $tests[$i]['id_test'];
							
							echo "<form method=\"POST\" action=\"index.php?controle=utilisateur&action=qcmEtu&test=" . $tests[$i]['id_test'] . "\">";
							echo "<input type=\"submit\" class=\"btn\" value=\"" . $tests[$i]['titre_test'] . "\"/>" . "<br><br>";
							echo "</form>";
						}?>

						<input type="submit" class="btn" value="Valider" />
						
						<!--<input type="text">-->
						</form>
					</div>	
				</div>
			</div>	
	</body>
</html>