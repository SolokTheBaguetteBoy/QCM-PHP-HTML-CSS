<?php 
	/*controleur utilisateur.php :
		fonctions-action de gestion des utilisateurs
	*/
	date_default_timezone_set('Europe/Paris');
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
	function ajout_u()  {
		echo ("ajout_u ::");
	}
	function maj_u() {
		echo ("maj_u ::");
	}
	function destr_u ()  {
		echo ("destr_u ::");
	}			
	
	
	//LES CHARGEURS DE PAGES 
	
	
	function accueilProf() {
		
		//require ("modele/contactBD.php");
		$idn = $_SESSION['profil'];
		require ("vue/Prof/header.tpl");
		// echo ("</br></br></br></br></br></br></br></br>");
		// foreach ($_SESSION['profil'] as $key => $value) {
				// echo ("Clé : $key; Valeur : $value<br />\n");
			// }
		require ("vue/Prof/accueilProf.tpl");
	}
	
	function accueilEtu() {
		require ("vue/Etu/header.tpl");
		require ("./vue/Etu/accueilEtu.tpl");
	}
	
	function qcmEtu(){
		require ("modele/connectBD.php");
		require("vue/Etu/headertest.tpl");
		require("./vue/Etu/testEtu.tpl");
		//var_dump($_POST);
		
		    // retourne "ef"
		if(isset( $_POST)){
			foreach($_POST as $key => $value){
				$idQuest = substr($key,2);        //A AMELIORER ATTENTION POSSIBLE BUG
				$idRep = substr($key,-1);         //A AMELIORER ATTENTION POSSIBLE BUG
				$idTest = getTest($_SESSION['profil']['id_etu'], $_GET['test'])['id_test'];
				$select="INSERT INTO resultat(id_test, id_etu, id_quest, date_res, id_rep) 
						VALUES ('%s', '%s', '%s', '%s', '%s') ";
				$requete = sprintf($select,$idTest,$_SESSION['profil']['id_etu'],$idQuest,date('Y-m-d'),$idRep);
				$res = mysqli_query($link, $requete) or die (utf8_encode("erreur de requête : ") . $requete);	
			}
		}
	}
	
	function testSelectorEtu(){
		require("vue/Etu/header.tpl");
		require("vue/Etu/TestSelectorEtu.tpl");
	}
	
	function statEtu(){
		require("vue/Etu/header.tpl");
		require("./vue/Etu/statsEtu.tpl");
	}
	
	
	function CreerTest() {
		require ("modele/connectBD.php");
		require ("vue/Prof/header.tpl");
		require ("vue/Prof/CreerTest.tpl");
		
	
		    // retourne "ef"
	if(isset( $_POST['nomTest']) && isset( $_POST['numGroupe'])){
			// var_dump($_POST);
			// var_dump(substr(key($_POST),-1));
			// var_dump($_SESSION['profil']['id_prof']);
			// var_dump($_POST['numGroupe']);
			// var_dump($_POST['nomTest']);
			// var_dump(date("Y-m-d"));
			$selectCreerTest = "INSERT INTO test (id_prof,num_grpe,titre_test,date_test,bActif)
 VALUES ('%s','%s','%s','%s',%s)";
	$reqCreerTest = sprintf($selectCreerTest,$_SESSION['profil']['id_prof'],$_POST['numGroupe'],$_POST['nomTest'],date("Y-m-d"),'false');
			$res = mysqli_query($link, $reqCreerTest) or die (utf8_encode("erreur de requête : ") . $reqCreerTest);	
			
			foreach($_POST as $key => $value){
				if($key!='nomTest' && $key!='numGroupe'){
					$idQuest = substr($key, -1);
					$idTest = getLastTestCreated();
					$idQcm = getLastQcmCreated()+1;
					$selectCreerQcm = "INSERT INTO qcm (id_qcm,id_test,id_quest,bAutorise,bBloque) VALUES ('%s','%s','%s',%s,%s)";
					$reqCreerQcm = sprintf($selectCreerQcm,$idQcm,$idTest,$idQuest,'false','false');
					$res = mysqli_query($link, $reqCreerQcm) or die (utf8_encode("erreur de requête : ") . $reqCreerQcm);
				}
			}
		}
	}
	function VoirTest() {
		require ("vue/Prof/header.tpl");
		require ("vue/Prof/VoirTest.tpl");
	}
	
	function noTestFound(){
		require("vue/Etu/header.tpl");
		require("vue/Etu/noTestFound.tpl");
	}
	