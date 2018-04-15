<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="vue\styleCSS\styleaccueil.css"/>
			<meta charset="utf-8">
		
	</head>
	<body>
		<div class="row">
			<div class="col-sm-4 " id="bg"></div>
			<div class="col-sm-4 contenu">
				<div id="titre">
					<h1>QCM L<bleu>!</bleu>VE</h1>
					<h6>_______________</h6>
				</div>
	<button type="button" class="btn" data-toggle="modal" data-target="#myModal">Connexion</button>
			</div>
			<div class="col-sm-4 bg"></div>
		</div>
		
				<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog" >
					<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					    <div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal">&times;</button>
						    <h4 class="modal-title">Connexion</h4>
					    </div>
						
					    <div class="modal-body">
							<form class="form-horizontal" id="idform" action="index.php?controle=utilisateur&action=ident" method="post">
								<div class="form-group">
									<label class="control-label col-sm-3" for="nom">Identifiant:</label>
									<div class="col-sm-9">
										<input class="form-control" id="nom" placeholder="Entrez votre identifiant" name="nom" autofocus>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="num">Mot de passe:</label>
									<div class="col-sm-9">          
										<input type="password" class="form-control" id="num" placeholder="Entrez votre mot de passe" name="num">
									</div>
								</div>
								<div class="form-group">        
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn">Valider</button>
									</div>
								</div>
							</form>
							<div id ="m"> <?php echo $msg; ?> </div>
							</div>
						</div>
				</div>

				</div>
				</div>
	</body>
</html>

