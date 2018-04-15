<?php 

	function getTests($idn) {
		require ("Modele/connectBD.php");
		$i = 0;
		$select = "SELECT t.* 
				   FROM test as t, etudiant as e 
				   WHERE t.num_grpe = e.num_grpe 
				   AND e.id_etu = %s
				   AND t.bActif = 1";
		
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

?>