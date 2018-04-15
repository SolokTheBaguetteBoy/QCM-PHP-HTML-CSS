<?php

function getBilan($idn) {
		require ("Modele/connectBD.php");
		$i = 0;
		$select = "SELECT b.* 
				   FROM bilan as b, etudiant as e 
				   WHERE b.id_etu = e.id_etu 
				   AND e.id_etu = %s";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		$C[$i] = mysqli_num_rows ($res);
		$i++;
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de test";
		}
		else {
			//$C = array();
			while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				
				$C[$i] = $c;
				$i++;
			}
			return $C;
		}
	}
	
function getNomTestDuBilan($idn) {
		require ("Modele/connectBD.php");
		
		$select = "SELECT t.* 
				   FROM bilan as b, test as t 
				   WHERE b.id_test = t.id_test 
				   AND b.id_bilan = %s";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de test";
		}
		else {
			//$C = array();
			while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				
				$C = $c;
			}
			return $C;
		}
	}
	
function getRéponsesEtudiant($idn) {
		require ("Modele/connectBD.php");
		$i = 0;
		$select = "SELECT r2.*
				   FROM resultat as r, etudiant as e,reponse as r2 
				   WHERE r.id_etu = e.id_etu AND e.id_etu = %s 
				   AND r.id_rep = r2.id_rep
				   ";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de test";
		}
		else {
			//$C = array();
			
			$C[$i] = mysqli_num_rows ($res);
			$i++;
			while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				
				$C[$i] = $c;
				$i++;
			}

			return $C;
		}
	}
	
	function getRepTestEtu($idtest, $idetu) {
		require ("Modele/connectBD.php");
		$i = 0;
		$select = "SELECT r2.* 
				   FROM resultat as r, reponse as r2 
				   WHERE r.id_rep = r2.id_rep 
				   AND r.id_etu = %s 
				   AND r.id_test = %s";
		
		$req = sprintf($select,$idetu, $idtest);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de test";
		}
		else {
			//$C = array();
			
			$C[$i] = mysqli_num_rows ($res);
			$i++;
			while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				
				$C[$i] = $c;
				$i++;
			}

			return $C;
		}
	}
	
	function getMoyenne($idn) {
		require ("Modele/connectBD.php");
		
		$select = "SELECT AVG(b.note_test) 
				   FROM bilan as b 
				   WHERE b.id_test = %s";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		$C = mysqli_num_rows ($res);
		
		if (mysqli_num_rows ($res) == 0) {
			return 0;
		}
		else {
			//$C = array();
			while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
		
				$C = $c;
			}
			return $C;
		}
	}
?>