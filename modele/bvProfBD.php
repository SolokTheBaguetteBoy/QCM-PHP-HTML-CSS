<?php

	function test($idn) {
		
		require ("Modele/connectBD.php");
		
		$select = "select titre_test 
		from test t";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de test";
		}
		else {
			$C = array();
			while ($c = mysqli_fetch_assoc($res) and isset($c)) {
				$C[] = $c; //stockage des enregistrements dans $C
			}			
			return $C;
		}
	}


?>
