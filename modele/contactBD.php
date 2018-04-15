<?php 
	/*Fonctions-modèle réalisant les requètes de gestion des contacts en base de données*/
	
	// liste_contact_bd : retourne la liste des informations pour chaque contact de l'utilisateur $id
	function contacts($idn) {
		require ("Modele/connectBD.php") ; //connexion $link à MYSQL et sélection de la base
		
		$select = "select nom, prenom, email 
		from contact c, utilisateur u 
		where c.id_nom = '%s'
		and c.id_contact = u.id_nom
		limit 0,30";
		
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
	function nomProf($idn) {
		require ("Modele/connectBD.php") ; //connexion $link à MYSQL et sélection de la base
		
		$select = "select nom, prenom
		from professeur c
		where c.login_prof = '%s';"
		
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
		or die (utf8_encode("erreur de requête : ") . $req); 
		
		if (mysqli_num_rows ($res) == 0) {
			return false; //"pas de contacts";
		}
		else {
			while ($c = mysqli_fetch_assoc($res) and isset($c)) {
				$C = array();
				//echo ("Enregistrement : <br /><pre>"); var_dump($c); echo ("</pre>"); 
				$C = $c; //stockage des enregistrements dans $C
			}			
			return $C;
		}
	}
?>
