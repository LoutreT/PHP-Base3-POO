<?php

class Personnage
{
  private $_experience = 50 ;

  private function afficherExperience()
  {
    echo $this->_experience;
  }

  private function gagnerExperience()
  {
    $this->_experience = $this->_experience + 1;
  }
}

$perso = new Personnage;
$perso->gagnerExperience();   // on gagne de l'expérience.
$perso->afficherExperience(); // on affiche la nouvelle valeur de l'attribut.

?>
