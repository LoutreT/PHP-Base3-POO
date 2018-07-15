<?php


class Personnage
{
  private $_degats = 0 ;
  private $_experience = 50 ;
  private $_force = 20 ;


  private function frapper($persoAfrapper)
  {
    $persoAFrapper->_degats += $this->_force;
  }

  private function afficherExperience()
  {
    echo $this->_experience;
  }

  private function gagnerExperience()
  {
    $this->_experience = $this->_experience + 1 ;
  }
}


$perso = new Personnage ;

$perso->gagnerExperience() ;   // on gagne de l'expérience.
$perso->afficherExperience() ; // on affiche la nouvelle valeur de l'attribut.


$perso01 = new Personnage ;
$perso02 = new Personnage ;

$perso01->frapper($perso02) ;
$perso01->gagnerExperience() ;

$perso02->frapper($perso01) ;
$perso02->gagnerExperience() ;

?>
