<?php

class Personnage{                                                                                         // OBJET PERSONNAGE
  private $_degatsSubis = 0;
  private $_force = 0;
  private $_vie = 0;
  private $_mana = 150;

  public function __construct($force, $degats, $vie){    // Constructeur demandant 2 paramètres
    $this->setForce($force);                             // Initialisation de la force.
    $this->setDegats($degats);                           // Initialisation des dégâts.
    $this->setVie($vie);                                 // Initialisation des vie.
    $this->_experience = 1;                              // Initialisation de l'expérience à 1.
  }

 ///////////////////////////////////////////// GUETTERS ///////////////////////////////////////////////
  public function vie(){
    return $this->_vie;
  }
  public function force(){
    return $this->_force;
  }
  public function degatsSubis(){
    return $this->_degatsSubis;
  }
  public function mana(){
    return $this->_mana;
  }
  public function experience(){
    return $this->_experience;
  }
  /////////////////////////////////////////// END GETTERS /////////////////////////////////////////////


  public function frapper(Personnage $persoAFrapper){
    $persoAFrapper ->_degatsSubis += $this ->_force;
    $persoAFrapper ->_vie -= $this ->_force;
  }
  
  ///////////////////////////////////////////// MUTATEURS ///////////////////////////////////////////////
  
  public function setDegats($degats){
    if (!is_int($degats)){
      trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }
    $this->_degats = $degats;
  }

  public function setForce($force){
    if (!is_int($force)){
      trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }
    
    if ($force > 100){
      trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
      return;
    }

    $this->_force = $force;
  }

  public function setVie($vie){
    if (!is_int($vie)){
      trigger_error('La vie d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }
    
    if ($vie > 700){
      trigger_error('La vie d\'un personnage ne peut dépasser 250', E_USER_WARNING);
      return;
    }
    $this->_vie = $vie;
  }

  public function gagnerExperience(){
    $this->_experience ++;
  }

  public function setExperience($experience){                                                           // Mutateur chargé de modifier l'attribut $_experience.
    if (!is_int($experience)){
      trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }
    
    if ($experience > 100){
      trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
      return;
    }
    
    $this->_experience = $experience;
  }
  ///////////////////////////////////////////// END MUTATEURS ///////////////////////////////////////////////
}

?>