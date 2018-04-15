<?php
	$hote="localhost";   		
	$login="root";  		
	$pass=""; 			
	$bd="pwebprojet"; 
	

	// $bd = new PDO ('mysql:host=localhost;dbname=pweb17_pavy;charset=utf8', 'pavy', 'pavy');

	if (!isset($link)) {
		$link = mysqli_connect($hote, $login, $pass) 
			or die ("erreur de connexion :" . mysql_error()); 
		// mysql_set_charset ('UTF8');
		mysqli_set_charset($link,"utf8");
		mysqli_select_db($link, $bd) 
			or die (htmlentities("erreur d'accès à la base :") . $bd);
	}
?>