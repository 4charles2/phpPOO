<?php
	require "connexionBDD.php";

	function chargerClass($class){
		require $class.".php";
	}

	spl_autoload_register("chargerClass");

	$charles = new Personnage;

	$charles->setAttribut("_nom", "charles");

	echo $charles->getAttribut("_nom")."<br>";

	

	// On admet que $db est un objet PDO
	$request = $db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM db_personnage');
    	
	while ($perso = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
	{
  		echo $perso['nom'], ' a ', $perso['forcePerso'], ' de force, ', $perso['degats'], ' de dégâts, ', $perso['experience'], ' d\'expérience et est au niveau ', $perso['niveau'],"<br>";
	}
?>