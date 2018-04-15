<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<!-- <title>authentification - 2 fichiers</title> -->
		<link rel="stylesheet" href="vue/styleCSS/styleAccueilPerso.css">
		<?php require ("modele/ProfBD.php") ; ?>
	</head>
	<body>
	<!-- Un bouton avec '+' dedans, et un onclick qui appelle une fonction avec -->
<!-- en param le bouton et l'id du div à afficher/masquer. -->
									  <!-- Modal -->
	<div class="modal fade" id="QCMnew" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				</div>
				<div class="modal-body">
				    <p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
				    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


<!-- Un div caché avec un attribut id -->

		<div class="panel-group panelContent">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1>Créat<vert>i</vert>on d'un test</h1>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" id="idform" action="index.php?controle=utilisateur&action=CreerTest" method="post">
						<div class="row pasheader">
							<div class="col-sm-6">
							<!-- NOM TEST -->
								<div class="form-group">
									<label for="nomTest">Nom du test :</label>
									<input type="text" class="form-control" id="nomTest" name="nomTest">
								</div>
								<!-- CHOIX GROUPE -->	
								<div class="form-group">
									<label for="numGroupe">Choisir un groupe :</label>
									<select class="form-control" id="numGroupe" name="numGroupe">
										<?php Form_Deroulant_Groupe();?>
									</select>
								</div>
								<div class="form-group">
									<h5>Ajouter Question existante :</h5>	
									<!-- LA DIV QUI SCROLL -->
									<div class="scroll"> 
										<!-- LE GENERATEUR DE QUESTIONS -->
										<div class="panel-group">
										<button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#QCMnew">Nouvelle question à choix multiples</button>
										<?php Form_Checkbox_Question();?>
										</div>
									</div>
								</div>	
							
							</div>
							<div class="col-sm-6">
								<label class="titresecondaire">Quest<vert>i</vert>ons sélect<vert>i</vert>onnées</label>
								<div class="scroll scrolldroite"> 
									<?php Form_Checkbox_QuestionChoisies();?>
								</div>
								<button type="submit" class="btn btn-info btn-block btn-lg">Créer</button>
							</div>
						</div>	
					</form>					

				</div>
			</div>			
		</div>
	</body>
</html>

	