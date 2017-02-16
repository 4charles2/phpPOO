<?php
	class Personnage {
		public $nom;

		private $_force = 20;
		private $_localisation = "Nancy";
		private $_experience = 1;
		private $_degats = 0;

		const FORCE_PETITE = 20;
		const FORCE_MOYENNE = 50;
		const FORCE_GRANDE = 80;

		private static $_nbrPersoInstancier = 0;

		public function __construct($force, $degat){
			$this->setForce($force);
			$this->setExperience($degat);
			$this->_experience = 1;
			self::$_nbrPersoInstancier++;
		}
		public function setDegat($degat){
			if($this->verifAttribut($degat, "degats")){
				$this->_degats = $degat;
			}
			return;
		}
		public function setForce($force) {
			if(in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])){
				$this->_force = $force;
			}
		}
		public function setExperience($experience){
			if ($this->verifAttribut($experience, "experience")){
				$this->_experience = $experience;
			}
			return;
		}
		public function frapper(Personnage $persotarget) {
			$persotarget->_degats += $this->_force;
			$this->gagnerExperience();
		}
		public function gagnerExperience(){
			$this->_experience++;
		}
		public function nom(){
			return $this->nom;
		}
		public function force(){
			return $this->_force;
		}
		public function experience() {
			return $this->_experience;
		}
		public function degat() {
			return $this->_degats;
		}
		private function verifAttribut($valeur, $nom){
			if (!is_int($valeur)){
				trigger_error($nom." d\'un personnage doit être un nombre entier", E_USER_WARNING);
				return 0;
			}
			if ($valeur > 100){
				trigger_error("d\'un personnage ne doit pas depasser 100", E_USER_WARNING);
				return 0;
			}
			return 1;
		}
		public static function getNbrPersoInstancier(){
			return self::$_nbrPersoInstancier;
		}
	}
?>