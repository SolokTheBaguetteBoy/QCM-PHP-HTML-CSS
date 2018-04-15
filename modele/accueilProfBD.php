<?php 

	function test($idn) {
		require ("Modele/connectBD.php") ; //connexion $link à MYSQL et sélection de la base
		
		$select = "select test_titre 
		from titre";
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de contacts";
		}
		else {
			$C = array();
			while ($c = mysqli_fetch_assoc($res) and isset($c)) {
				//echo ("Enregistrement : <br /><pre>"); var_dump($c); echo ("</pre>"); 
				$C[] = $c; //stockage des enregistrements dans $C
			}			
			return $C;
		}
	}

?>
