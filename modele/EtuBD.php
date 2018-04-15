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
function Form_Deroulant_Groupe() {
	require ("modele/connectBD.php");
	$select = "select num_grpe
	from groupe t";	
	$req = $select;
	$res = mysqli_query($link, $req)	
	or die (utf8_encode("erreur de requête : ") . $select); 


	while ($c = mysqli_fetch_assoc($res) and isset($c)) {
		echo("<".$valeur.">");
	}			
	
}

function Form_Test($idn) {
	// $typeboutton="";
	$do = getTest($_SESSION['profil']['id_etu'], $idn); //Faire en sorte qu'on affiche toutes les 
																			//questions, et que celles auquel l'étudiant 
																			//a répondue soient bloquée
							echo($do['titre_test']);
							//$prof = getProf($do['id_test']);
							//echo($prof);
							
							if($do['bActif'] == 1){
								echo ("<br>");
								echo ("<br>");
								$do2 = getQuestion($do['id_test']);
								for($i = 0; $i < getNBQuestionsTest($do['id_test']);$i++){
									$iString = (string) $i;
									if($do2[$i] != null){
										echo $do2[$i]['texte'];
										$qcm = questionEnCours($do2[$i]['id_quest']);
										
										if(questionEnCours($do2[$i]['id_quest']) == 1){
											$disable = "disabled";
										}
										else {
											$testing = questionRepondue($_GET['test'], $_SESSION['profil']['id_etu'], $do2[$i]['id_quest']);
											
											if(questionRepondue($_GET['test'], $_SESSION['profil']['id_etu'], $do2[$i]['id_quest']) == 1){
												$disable = "disabled";
											}
											else {$disable = "";}
											}
											$testerr = toVarDumpShit($_GET['test'], $_SESSION['profil']['id_etu'], $do2[$i]['id_quest']);
											
											if($do2[$i]['bmultiple'] == 1){
												echo " (réponses multiples)";
												
											}
											else {
												echo " (réponse unique)";
												
											}
											//réponses
											echo"<br>";
											$réponses = getReponses($do2[$i]['id_quest']);
											
											for ($j=0;$j<sizeof($réponses);$j++){
												echo "<br> <input type='checkbox' autocomplete='off' name='";
												echo $do2[$i]['id_quest']."-".$réponses[$j]['id_rep'];
												echo "' id='case' value='";
												echo ($réponses[$j]['bvalide']."'".$disable."/> <label for='case'>");
												echo($réponses[$j]['texte_rep']);
												echo "</label>";
											}
											echo"<br><br>";
											
											
											// echo "<br> <input type='checkbox' name='case' id='case' value='";
											// echo ($réponses[1]['bvalide']."'".$disable."/> <label for='case'>");
											// echo($réponses[1]['texte_rep']);
											// echo "</label>";
											
											
											
											// echo "<br> <input type='checkbox' name='case' id='case' value='";
											// echo ($réponses[2]['bvalide']."'".$disable."/> <label for='case'>");
											// echo($réponses[2]['texte_rep']);
											// echo "</label>";
											// echo "<br><br>";

									
											
							}}}
}

?>