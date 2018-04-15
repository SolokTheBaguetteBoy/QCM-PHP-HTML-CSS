<?php


function Form_Deroulant_Tests($idProf) {
	require ("modele/connectBD.php");
	$select = "select titre_test
	from test t
	where t.id_prof = '%s'";	
	$req = sprintf($select,$idProf);
	$res = mysqli_query($link, $req)	
	or die (utf8_encode("erreur de requête : ") . $select); 


	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		echo("<option>".implode("|",$c)."</option>");
	}			
}

function Form_Checkbox_Tests($idProf) {
	require ("modele/connectBD.php");
	$select = "select *
	from test t
	where t.id_prof = '%s'";	
	$req = sprintf($select,$idProf);
	$res = mysqli_query($link, $req)		
	or die (utf8_encode("erreur de requête : ") . $req); 
	$C=array();
	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		$C[]=$c;
	
	}
	
	foreach($C as $value){
		/* $lesreponses = Reponse_of_Question($value['id_quest']);
		$i=0; */
		echo ("	<div class='panel ");
		if($value['bActif']==true){
			echo("panel-success");
		}
		else{
			echo("panel-default");
		}
		echo("'><div class='panel-heading'><div class='checkbox'><label><input type='checkbox' id='");
		echo($value['id_test']);
		echo("' data-toggle='collapse' data-target='#TestChoisi");
		echo($value['id_test']);
		echo("' value=''>");
		echo($value['titre_test']);
		echo("</input></label></div></div><div class='panel-body'>Groupe : ");
		echo($value['num_grpe']);
		echo(' | Date : ');
		echo($value['date_test']);
		echo(' | Activité : ');
		if($value['bActif']==true){
			echo("Actif");
		}
		else{
			echo("Inactif");
		}
		echo("</div></div>");
		/*<button class='btn btn-info dropdown-toggle btn-block' type='button' id='menu1' data-toggle='dropdown'>Sélectionner<span class='caret'></span></button>*/
	}
}

function Form_Checkbox_TestSelectionné($idProf) {
	require ("modele/connectBD.php");
	$select = "select *
	from test t
	where t.id_prof = '%s'";	
	$req = sprintf($select,$idProf);
	$res = mysqli_query($link, $req)		
	or die (utf8_encode("erreur de requête : ") . $req); 
	$C=array();
	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		$C[]=$c;
	
	}
	
	foreach($C as $value){
		/* $lesreponses = Reponse_of_Question($value['id_quest']);
		$i=0; */
		echo ("	<div class='collapse panel panel-default' id='TestChoisi");
		echo($value['id_test']);
		echo("'><div class='panel-heading'><div class='checkbox'><label>");
		echo($value['titre_test']);
		echo("</label><label>Groupe : ");
		echo($value['num_grpe']);
		echo(' | Date : ');
		echo($value['date_test']);
		echo(' | Activité : ');
		if($value['bActif']==true){
			echo("Actif");
		}
		else{
			echo("Inactif");
		}
		
		echo("</label></div></div><div class='panel-body'>http://bootstrapswitch.com/examples.html");
		
		echo("</div></div>");
		/*<button class='btn btn-info dropdown-toggle btn-block' type='button' id='menu1' data-toggle='dropdown'>Sélectionner<span class='caret'></span></button>*/
	}
}

function Form_Checkbox_GestionDuTest($idProf) {
	require ("modele/connectBD.php");
	$select = "select *
	from test t
	where t.id_prof = '%s'";	
	$req = sprintf($select,$idProf);
	$res = mysqli_query($link, $req)		
	or die (utf8_encode("erreur de requête : ") . $req); 
	$C=array();
	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		$C[]=$c;
	
	}
	
	foreach($C as $value){
		/* $lesreponses = Reponse_of_Question($value['id_quest']);
		$i=0; */
		echo ("<div class='collapse panel panel-default' id='TestChoisi");
		echo($value['id_test']);
		echo("'><div class='panel-heading'><div class='checkbox'>");
		echo($value['titre_test']);
		echo("<label>Groupe : ");
		echo($value['num_grpe']);
		echo(' | Date : ');
		echo($value['date_test']);
		echo("</label>");
		echo(' | Activité : ');	
		echo("<div class='toLeft'><input type='checkbox' data-toggle='toggle' data-on='Enabled' data-off='Disabled'>
		<input type='checkbox' data-toggle='toggle' data-on='Enabled' data-off='Disabled'></div>");
		echo("</div></div><div class='panel-body'>");
		Form_QuestionsOfTest($value['id_test']);
		echo("</div></div>");
		/*<button class='btn btn-info dropdown-toggle btn-block' type='button' id='menu1' data-toggle='dropdown'>Sélectionner<span class='caret'></span></button>*/
	}
}

function Form_Deroulant_Groupe() {
	require ("modele/connectBD.php");
	$select = "select num_grpe
	from groupe t";	
	$req = $select;
	$res = mysqli_query($link, $req)	
	or die (utf8_encode("erreur de requête : ") . $select); 


	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		echo("<option>".implode("|",$c)."</option>");
	}
}

function Reponse_of_Question($idQuest) {
	require ("modele/connectBD.php");
	$select = "select *
	from reponse r
	where r.id_quest = '%s'";	
	$req = sprintf($select,$idQuest);
	$res = mysqli_query($link, $req);	
	
	$C=array();
	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		$C[]=$c;
		
	}
	return $C;	
}

function Form_Checkbox_Question() {
	require ("modele/connectBD.php");
	$select = "select titre,texte,id_quest
	from question q";	
	$req = $select;
	$res = mysqli_query($link, $req)	
	or die (utf8_encode("erreur de requête : ") . $select); 
	$C=array();
	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		$C[]=$c;
	
	}
	
	foreach($C as $value){
		$lesreponses = Reponse_of_Question($value['id_quest']);
		$i=0;
		echo ("	<div class='panel panel-default'><div class='panel-heading'><div class='checkbox'><label><input type='checkbox' id='");
		echo($value['id_quest']);
		echo("' data-toggle='collapse' data-target='#Choisie");
		echo($value['id_quest']);
		echo("'  name='Question");
		echo($value['id_quest']);
		echo("'value=''>");
		echo($value['titre']);
		echo("</input></label></div></div><div class='panel-body'>");
		echo($value['texte']);
		echo("</div><div class='dropdown'><button class='btn btn-info dropdown-toggle btn-block' type='button' id='menu1' data-toggle='dropdown'>Réponses<span class='caret'></span></button><ul class='dropdown-menu' role='menu' aria-labelledby='menu1'><li ><a");
		if($lesreponses[$i]['bvalide']==true){
			echo(" class='right'");
		}
		else{
			echo(" class='wrong'");
		}
		echo("role='menuitem' tabindex='-1' href='#'>");
		echo($lesreponses[$i]['texte_rep']);
		echo("</a></li>");
		$i++;
		for(;$i<sizeof($lesreponses,0);$i++){
			
			
			echo("<li><a ");
			if($lesreponses[$i]['bvalide']==true){
				echo("class='right'");
			}
			else{
				echo("class='wrong'");
			}
			echo("role='menuitem' tabindex='-1' href='#'>");
			echo($lesreponses[$i]['texte_rep']);
			echo("</a></li>");
		}
		echo("</ul></div></div>");
	}
}

function Form_Checkbox_QuestionChoisies() {
	require ("modele/connectBD.php");
	$select = "select titre,texte,id_quest
	from question q";	
	$req = $select;
	$res = mysqli_query($link, $req)	
	or die (utf8_encode("erreur de requête : ") . $select); 
	$C=array();
	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		$C[]=$c;
	
	}
	
	foreach($C as $value){
		$lesreponses = Reponse_of_Question($value['id_quest']);
		$i=0;
		echo ("	<div class='panel panel-default collapse' id='Choisie");
		echo($value['id_quest']);
		echo("'><div class='panel-heading'><div class=''><label>");
		echo($value['titre']);
		echo("</label></div></div><div class='panel-body'>");
		echo($value['texte']);
		echo("</div><div class='dropdown'><button class='btn btn-info dropdown-toggle btn-block' type='button' id='menu1' data-toggle='dropdown'>Réponses<span class='caret'></span></button><ul class='dropdown-menu' role='menu' aria-labelledby='menu1'><li ><a");
		if($lesreponses[$i]['bvalide']==true){
			echo(" class='right'");
		}
		else{
			echo(" class='wrong'");
		}
		echo("role='menuitem' tabindex='-1' href='#'>");
		echo($lesreponses[$i]['texte_rep']);
		echo("</a></li>");
		$i++;
		for(;$i<sizeof($lesreponses,0);$i++){
			
			
			echo("<li><a ");
			if($lesreponses[$i]['bvalide']==true){
				echo("class='right'");
			}
			else{
				echo("class='wrong'");
			}
			echo("role='menuitem' tabindex='-1' href='#'>");
			echo($lesreponses[$i]['texte_rep']);
			echo("</a></li>");
		}
		echo("</ul></div></div>");
	
	}	
}

function Form_QuestionsOfTest($idtest) {
	require ("modele/connectBD.php");
	$select = "select q.titre,q.texte,q.id_quest from question q, qcm where id_test = '%s' and q.id_quest = qcm.id_quest";	
	$req = sprintf($select,$idtest);
	$res = mysqli_query($link, $req)	
	or die (utf8_encode("erreur de requête : ") . $req); 
	$C=array();
	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		$C[]=$c;
	
	}
	
	foreach($C as $value){
		$lesreponses = Reponse_of_Question($value['id_quest']);
		$i=0;
		echo ("	<div class='panel panel-default' id='Choisie");
		echo($value['id_quest']);
		echo("'><div class='panel-heading row'><div class='col-sm-6'><label>");
		echo($value['titre']);
		echo("</label></div><div class='col-sm-4'>");
		echo("</div></div><div class='panel-body'>");
		echo($value['texte']);
		echo("</div><div class='dropdown'><button class='btn btn-info dropdown-toggle btn-block' type='button' id='menu1' data-toggle='dropdown'>Réponses<span class='caret'></span></button><ul class='dropdown-menu' role='menu' aria-labelledby='menu1'><li ><a");
		if($lesreponses[$i]['bvalide']==true){
			echo(" class='right'");
		}
		else{
			echo(" class='wrong'");
		}
		echo("role='menuitem' tabindex='-1' href='#'>");
		echo($lesreponses[$i]['texte_rep']);
		echo("</a></li>");
		$i++;
		for(;$i<sizeof($lesreponses,0);$i++){
			
			
			echo("<li><a ");
			if($lesreponses[$i]['bvalide']==true){
				echo("class='right'");
			}
			else{
				echo("class='wrong'");
			}
			echo("role='menuitem' tabindex='-1' href='#'>");
			echo($lesreponses[$i]['texte_rep']);
			echo("</a></li>");
		}
		echo("</ul></div></div>");
	
	}	
}

function getLastQcmCreated() {
	require ("modele/connectBD.php");
	$select2 = "select max(id_qcm) as nbMax
	from qcm";	
	$req = $select2;
	$res = mysqli_query($link, $req)	
	or die (utf8_encode("erreur de requête : ") . $select2); 
	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		return $c['nbMax'];
	
	}			
}
function getLastTestCreated() {
	require ("modele/connectBD.php");
	$select = "select max(id_test)  as nbMax
	from test";	
	$req = $select;
	$res = mysqli_query($link, $req)	
	or die (utf8_encode("erreur de requête : ") . $select); 
	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		return $c['nbMax'];
	
	}			
}

?>

