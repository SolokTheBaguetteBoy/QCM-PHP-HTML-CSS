	<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<!-- <title>authentification - 2 fichiers</title> -->
		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<link rel="stylesheet" href="vue/styleCSS/styleAccueilPerso.css">
		<?php require ("modele/ProfBD.php") ; ?>
	</head>
	<body>
	<!-- Un bouton avec '+' dedans, et un onclick qui appelle une fonction avec -->
<!-- en param le bouton et l'id du div à afficher/masquer. -->
									  <!-- Modal -->

		<div class="panel-group panelContent">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1>Gest<vert>i</vert>on de mes test</h1>
				</div>
				<div class="panel-body">
					<form>
						<div class="row pasheader">
							<div class="col-sm-6">
								<label class="titresecondaire">Select<vert>i</vert>onnez un test</label>
								<div class="from-group">
									<div class="scroll">
										<?php Form_Checkbox_Tests($_SESSION['profil']['id_prof']);?>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<label class="titresecondaire">Opt<vert>i</vert>on du test</label>
								<div class="from-group">
									<div class="scroll">
										<?php Form_Checkbox_GestionDuTest($_SESSION['profil']['id_prof']);?>
									</div>
								</div>
							</div>
						</div>	
					</form>					
				</div>
			</div>			
		</div>
	</body>
</html>

	