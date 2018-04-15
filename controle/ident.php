<?php  

	session_start();
	$nom= isset($_POST['nom'])?($_POST['nom']):'';
	$num= isset($_POST['num'])?($_POST['num']):'';
	$msg='';

	
	if  (count($_POST)==0){
		echo 'je suis dans ident';
	require('vue/utilisateur/ident.tpl') ;}
      else {
            $nom =$_POST['nom'];
            $num=$_POST['num'];
			$profil = array(); //profil affecté par l'appel à verif_ident
			if  (! verif_ident($nom,$num,$profil)) {
				$msg ="erreur de saisie";
				require('vue/utilisateur/ident.tpl') ;;
              }
			else  { 
				$_SESSION['profil']= $profil;
				//echo ("ok, bienvenue : " . $_SESSION['profil']['nom'] . "<br/><br/>"); 
				$id = $_SESSION['profil']['id_etu'];  //idem  $id = $profil['id_nom']
				//$Contact = liste_contacts($id);
				require ('vue/utilisateur/accueil.tpl');
				
			}
      }	
  
	function verif_ident($nom='',$num='', &$profil) {
		require ("modele/connectBD.php");
		$req= "select nom,id_etu  from etudiant where login_etu='%s' and pass_etu='%s' ;";
		$sql = sprintf ($req, $nom, $num);
		$res = mysqli_query($link,$sql)
			or die ('erreur de requete : ' . $sql);
		if (mysqli_num_rows($res)>0) {
			$profil=mysqli_fetch_assoc($res);
			return true;
		}	
		else {
			return false;
		}	
			
		
		//		return false;
	}
	
	/*function liste_contacts($idn) {
		require ("connect_SQL.php") ; 

		$select = "select nom, prenom, email 
					from contact c, utilisateur u 
					where c.id_nom = '%s'
					and c.id_contact = u.id_nom
					limit 0,30";
					
		$req = sprintf($select,$idn);
		
		$res = mysqli_query($link, $req)	
			or die ("erreur de requête : " . $req); 

		if (mysqli_num_rows ($res) == 0) {
			return false ; //"pas de contacts";
			}
		
		$C= array();
		while ($c = mysqli_fetch_assoc($res) and isset($c)) {
			$C[] = $c; //stockage dans $C des enregistrements sélectionnés
		}		

		return $C;
	}*/


?>
