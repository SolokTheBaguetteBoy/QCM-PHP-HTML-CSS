<!doctype html>
	<link rel="stylesheet" href="vue/styleCSS/styleAccueilPerso.css">
	<?php require "./modele/statsEtu.php"; ?>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Statistiques de l'étudiant</title>
		<!-- 	<link rel="stylesheet" href="style.css">
			<script src="script.js"></script>
			
		-->

	</head>
	<body>
		<div class="panel-group panelContent">
		<!-- <div class="Content"> -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1>Stat<vert>i</vert>st<vert>i</vert>ques</h1>
				</div>
			
				<div class="panel-body">
					<?php $bilan = getBilan($_SESSION['profil']['id_etu']);
					
					for($j = 1; $j <= $bilan[0]; $j++){
					
						$testDuBilan = getNomTestDuBilan($bilan[$j]['id_bilan']);
						echo("Test : " . $testDuBilan['titre_test'] . "<br><br>Note du test : " . $bilan[$j]['note_test'] . "<br><br>");
						$réponses = getRepTestEtu($bilan[$j]['id_test'], $_SESSION['profil']['id_etu']);
						
						for($i = 1; $i <= $réponses[0]; $i++){
						
							echo("Réponse : " . $réponses[$i]['texte_rep'] . "<br>");
						
						}
						
						$moyenne = getMoyenne($bilan[$j]['id_test']);
						
						echo "<br>Moyenne du test : " . $moyenne['AVG(b.note_test)'] . "<br><br>";
						
					}	
					?>
	
				</div>
			</div>
		</div>

	</body>
</html>