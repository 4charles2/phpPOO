<?php 
	class Personnage{
		private $_id;
		private $_nom;
		private $_forcePerso;
		private $_degats;
		private $_niveau;
		private $_experience;

		public function __construct(){

		}

		public function setAttribut($nomAttribut, $valeur){
			if($this->verifSetAttribut($nomAttribut, $valeur)){
				$this->$nomAttribut = $valeur;
			}
		}
		public function getAttribut($nomAttribut) {
			return $this->$nomAttribut;
		}

		private function verifSetAttribut($nomAttribut, $valeur){
			if ($nomAttribut == "_force" || $nomAttribut == "_niveau" || $nomAttribut == "_experience") {
				if(is_int($valeur) && $valeur < 101  && $valeur > 0){
					return 1;
				} else {
					msgError("Doit être un entier compris entre 1 et 100", $nomAttribut);
				}
			} else {
				switch ($nomAttribut){
				case "_degat":
					if(is_int($valeur) && $valeur >= 0 && $valeur < 101) {
						return 1;
					}else{
						msgError("Doit être un entier compris entre 0 et 100", $nomAttribut);
					}
				break;
				case "_nom":
					if(is_string($valeur)){
						return 1;
					}else{
						msgError("doit être une chaîne de caractère", $nomAttribut);
					}
				break;				
				}
			}
		}

		private function msgError($msgError, $element){
			trigger_error($element.$msgError, E_USER_WARNING);
		}
	}
?>