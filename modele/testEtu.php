<?php

	function getTest($idn, $idn2) {
		require ("Modele/connectBD.php");
		
		$select = "SELECT t.* 
				   FROM test as t, groupe as g, etudiant as e 
				   WHERE t.num_grpe = g.num_grpe 
				   AND e.num_grpe = g.num_grpe 
				   AND e.id_etu = '%s' 
				   AND t.bActif = 1
				   AND t.id_test = '%s'";
		
		$req = sprintf($select,$idn,$idn2);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de test";
		}
		else {
			//$C = array();
			while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				
				$C = $c;
				//echo($C['titre_test']);
			}
			return $C;
		}
	}
	
	function getProf($idn) {
		$test = getTest($idn);
		require ("Modele/connectBD.php");
		
		$select = "SELECT p.*
				   FROM test as t, professeur as p 
				   WHERE t.id_test = %s
				   AND t.id_prof = p.id_prof;";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête getProf : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false;
		}
		else {
			while ($c = mysqli_fetch_assoc($res)) {
				$C = $c;
			}
			return $C;
		}
	}
	
	function getQuestion($idn) {
		require ("Modele/connectBD.php");
		$i = 0;
		$select = "SELECT q2.*
				   FROM qcm as q, test as t, question as q2
				   WHERE q.id_test = t.id_test
				   AND t.id_test = '%s'
				   AND q.id_quest = q2.id_quest";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de question";
		}
		else {
			//$C = array();
			while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				$C[$i] = $c;
				$i++;
				//echo($c['texte']);
			}
			return $C;
		}
	}
	
	function getReponses($idn) {
		require ("Modele/connectBD.php");
		$i = 0;
		$select = "SELECT r.* 
				   FROM reponse as r, question as q 
				   WHERE q.id_quest = %s 
				   AND r.id_quest = q.id_quest";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de réponses";
		}
		else {
			//$C = array();
			while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				$C[$i] = $c;
				//echo($c['texte_rep']);
				//echo('<br>');
				$i++;
			}
			return $C;
		
	}}

	function questionEnCours($idn) {
		require ("Modele/connectBD.php");
		$select = "SELECT q.*
				   FROM qcm as q, question as q2
				   WHERE q.id_quest = q2.id_quest
				   AND q2.id_quest = %s";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die; 
		
		if (mysqli_num_rows ($res) == 1) {
			$C = 0;
		}
		else {
			//$C = array();
			while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				if($c['bBloque'] == 0){
				$C = 0;}
				else  {
					$C = 1;
				}
			}
			return $C;
		
	}}
	
	function getNBQuestionsTest($idn) {
		require ("Modele/connectBD.php");
		$select = "SELECT q.*
				   FROM test as t, qcm as q
				   WHERE t.id_test = q.id_test
				   AND t.id_test = '%s'";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die; 
		
		$C = mysqli_num_rows($res);
		
		return $C;
		
	}

	function questionRepondue($idtest, $idetu, $idquest){
		
		require ("Modele/connectBD.php");
		
		$select = "SELECT r.* 
				   FROM resultat as r 
				   WHERE r.id_etu = %s 
				   AND r.id_quest = %s 
				   AND r.id_test = %s";
		
		$req = sprintf($select, $idetu, $idquest, $idtest);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête getProf : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			$C = 0;
		}
		else {
			while ($c = mysqli_fetch_assoc($res)) {
				$C = 1;
			}
			return $C;
		}
		
	}
	
	function toVarDumpShit($idtest, $idetu, $idquest){
		
		require ("Modele/connectBD.php");
		
		$select = "SELECT r.* 
				   FROM resultat as r 
				   WHERE r.id_etu = %s 
				   AND r.id_quest = %s 
				   AND r.id_test = %s";
		
		$req = sprintf($select, $idetu, $idquest, $idtest);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête getProf : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			$C = 0;
		}
		else {
			while ($c = mysqli_fetch_assoc($res)) {
				$C = $c;
			}
			return $C;
		}
		
	}


 // //requete pour chercher ds la table test
 // //afficher une liste des tests
 // //choisir test
 // //choisir les questions
 
 
 // $listeTests = "SELECT titre_test FROM test ORDER BY date_test;";
 // //lier ça au tpl ..................

 // $listeQuestions = //getTestSelectionné().req(" SELECT texte FROM question WHERE id = id ;");
 ?>
