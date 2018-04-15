<?php
	/*Fonctions-modèle réalisant les requètes de gestion des utilisateurs en base de données*/
	
	// verif_bd : fonction booléenne. 
	// Si vraie, alors le profil de l'utilisateur est affecté en sortie à $profil
	function verif_bd($nom,$num,&$profil ) {
		
		require ("modele/connectBD.php") ; //connexion $link à MYSQL et sélection de la base
		echo 'UtilisateurBD';
		$select_prof= "select * from professeur where login_prof='%s' and pass_prof='%s'"; 
		$select_eleve= "select * from etudiant where login_etu='%s' and pass_etu='%s'"; 
		$req_prof = sprintf($select_prof,$nom,$num);
		$req_etu = sprintf($select_eleve,$nom,$num);
		
		$res_prof = mysqli_query($link, $req_prof)	
		or die (utf8_encode("erreur de requête : ") . $req_prof); 
		
		if (mysqli_num_rows ($res_prof) > 0) {
			$profil = mysqli_fetch_assoc($res_prof);
			/*
				echo ('<br /> dans verif_bd : <br /><pre>'); 
				print_r ($profil); 
				echo ('</pre><br />'); 
			*/
			
			return 1;
		} 
		else {
		$res_etu = mysqli_query($link, $req_etu)	
		or die (utf8_encode("erreur de requête : ") . $req_etu); 
		
		if (mysqli_num_rows ($res_etu) > 0) {
			$profil = mysqli_fetch_assoc($res_etu);
			//require('vue/accueilEtu.tpl');
			//accueilEtu();
			return -1;
		} 
		else {
			$profil = null;
			echo 'Echec de connexion';
			return 0;
		}
		}
	}
?>