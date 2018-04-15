<html>
<?php require("./modele/headerEtu.php"); ?>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="vue\styleCSS\header.css"/> 
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		
	</head>
	<body>
	<?php $nextAction = getTestExistant($_SESSION['profil']['id_etu']);?>
	<div class="navbar-fixed-top">
	<div class="row" id="header">
			<!-- <div class="col-sm-3 contenu"> -->
				<!-- <div id="titre"> -->
				<!-- </div> -->
			<!-- </div> -->
			<div class="col-sm-12 bg">
			
				<nav class="navbar navbar-inverse">
				  <div class="container-fluid">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					  </button>
					  <a class="navbar-brand" id="titre" href="#"><h1>QCM L<bleu>!</bleu>VE</h1></a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
					  <ul class="nav navbar-nav">
						<li class="active"><a href="index.php?controle=utilisateur&action=accueilEtu">Accueil</a></li>
							<li class="dropdown">
						  <a  href= "<?php echo ($nextAction);?>" >QCM</a>
						  <ul class="dropdown-menu">
							
						  </ul>
						</li>
						<li><a href="index.php?controle=utilisateur&action=statEtu">Statistiques</a></li>

					  </ul>
					  <ul class="nav navbar-nav navbar-right">
					  <?php $refresh = $_GET['action'];
						    $nexturl = "index.php?controle=utilisateur&action=" . $refresh;?>
					  <li><a href= <?php echo ("index.php?controle=utilisateur&action=" . $nexturl); ?>> <span class="glyphicon glyphicon-refresh"></span> Raffraichir</a></li>
						<li><a><span class="glyphicon glyphicon-user"></span> <?php echo(strtoupper($_SESSION['profil']['nom'])." ".$_SESSION['profil']['prenom']);?></a></li>
						<li><a href="index.php" data-toggle="tooltip" data-placement="bottom" title="à bientôt!"><span id="deco" class="glyphicon glyphicon-off"></span> Déconnexion</a></li>
						
						<script>
						$(document).ready(function(){
							$('[data-toggle="tooltip"]').tooltip();   
						});
						</script>

					  </ul>
					</div>
				  </div>
				</nav>
				  </div>
		</div>
		<hr noshade="false">
	</div>	</body>
</html>


