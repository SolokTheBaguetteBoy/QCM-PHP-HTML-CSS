<?php function getTestExistant($idn) {
		require ("Modele/connectBD.php");
		
		$select = "SELECT t.*
				   FROM test as t, etudiant as e
				   WHERE t.num_grpe = e.num_grpe
				   AND e.id_etu = %s
				   AND t.bActif = 1";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			$C = "index.php?controle=utilisateur&action=noTestFound";
		}
		else if (mysqli_num_rows ($res) > 0){
			//$C = array();
			while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				
					$C = "index.php?controle=utilisateur&action=testSelectorEtu";

				//echo($C['titre_test']);
			}
			
		}
		// else if (mysqli_num_rows ($res) > 1){
			// while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				
					// $C = "index.php?controle=utilisateur&action=testSelectorEtu";

				// //echo($C['titre_test']);
			// }
		// }
		return $C;
	}
	
	// function getBilanExistant($idn) {
		// require ("Modele/connectBD.php");
		
		// $select = "SELECT b.*
				   // FROM bilan as b, etudiant as e
				   // WHERE b.id_etu = e.id_etu
				   // AND e.id_etu = %s";
		
		// $req = sprintf($select,$idn);
		
		// $res = mysqli_query($link, $req)	
		// or die (utf8_encode("erreur de requête : ") . $req); 
		
		// if (mysqli_num_rows ($res) == 0) {
			// $C = "index.php?controle=utilisateur&action=noBilanFound";
		// }
		// else if (mysqli_num_rows ($res) > 0){
			// //$C = array();
			// while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				
					// $C = "index.php?controle=utilisateur&action=statEtu";

				// //echo($C['titre_test']);
			// }
			
		// }
		// // else if (mysqli_num_rows ($res) > 1){
			// // while ($c = mysqli_fetch_assoc($res) /*and isset($c)*/) {
				
					// // $C = "index.php?controle=utilisateur&action=testSelectorEtu";

				// // //echo($C['titre_test']);
			// // }
		// // }
		// return $C;
	// }
	
	?>