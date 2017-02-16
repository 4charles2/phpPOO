<?php
	require 'perso.php';

	$perso = new Personnage(60,0);
	$perso2 = new Personnage(100, 10);
	$perso->nom = "Joueur1";
	$perso2->nom = "Joueur2";

	$perso->frapper($perso2);
	$perso2->frapper($perso);

	echo "Le ",$perso->nom," a comme force ".$perso->force()." et comme experience ".$perso->experience().". Il a reçu comme dégat : ".$perso->degat()."<br>";
	echo "Contrairement au ".$perso2->nom." qui a comme force ".$perso2->force()." et comme experience ".$perso2->experience().". Il a recu comme dégat ".$perso2->degat()."<br>";

?>