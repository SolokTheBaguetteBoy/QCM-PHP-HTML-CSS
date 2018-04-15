<?php 
	/*controleur utilisateur.php :
		fonctions-action de gestion des utilisateurs
	*/

	function ident () {
		$nom=isset($_POST['nom'])?trim($_POST['nom']):'';
		$num=isset($_POST['num'])?trim($_POST['num']):'';
		$msg="";
		$_SESSION['profil'] = "";
		
		require ("./modele/utilisateurBD.php");
		
		if (count($_POST)==0)
		require("vue/utilisateur/ident.tpl");
		else {
			if (verifS_ident($nom, $num, $err) && (verif_bd($nom, $num, $profil) == 1)) {
				//echo ('<br />PROFIL : <pre>'); print_r ($profil); echo ('</pre><br />'); die("ident");
				
				//session_start(); //fait dans index
				$_SESSION['profil'] = $profil;
				$nexturl = "index.php?controle=utilisateur&action=accueilProf";
				header ("Location:" . $nexturl);
			}
			else {
				if (verifS_ident($nom, $num, $err) && (verif_bd($nom, $num, $profil) == -1)) {
				//echo ('<br />PROFIL : <pre>'); print_r ($profil); echo ('</pre><br />'); die("ident");
				
				//session_start(); //fait dans index
				$_SESSION['profil'] = $profil;
				$nexturl = "./index.php?controle=utilisateur&action=accueilEtu";
				header ("Location: " . $nexturl);
			}
			else {
				$msg = $err;
				require("vue/utilisateur/ident.tpl");
			}
			}
		}
	}
	
	function accueilProf() {
		
		//require ("modele/contactBD.php");
		$idn = $_SESSION['profil'];
		require ("vue/Prof/header.tpl")
		//echo $idn;
		//$Contact = contacts($idn);
		;
		// echo ("</br></br></br></br></br></br></br></br>");
		// foreach ($_SESSION['profil'] as $key => $value) {
				// echo ("Clé : $key; Valeur : $value<br />\n");
			// }
		require ("vue/Prof/accueilProf.tpl");
	}
	function accueilEtu() {
		
		//require ("modele/contactBD.php");
		$idn = $_SESSION['profil'];
		require ("vue/Etu/header.tpl");
		//$Contact = contacts($idn);
		// echo 'accueilEtu';
		require ("./vue/Etu/accueilEtu.tpl");
	}
	
	// vérification syntaxique des saisies
	// nom : composé de caractères alphanumériques et du tiret, chaîne non vide de 30 caractères maximum
	// num : composé de caractères alphanumériques, à raison de 6 à 8 caractères
	// En cas d'erreur, une information sur l'erreur est retournée dans $err 
	function verifS_ident($nom, $num, &$err) {
		if (!preg_match("`^[[:alpha:][:digit:]\-]{1,30}$`", $nom)) {
			$err = 'erreur de syntaxe sur le nom';
			return false;
		}
		if (!preg_match("`^[[:alpha:][:digit:]]{2,20}$`", $num)) {
			$err = 'erreur de syntaxe sur l\'identifiant.';
			return false;
		}
		return true;
	} 
	