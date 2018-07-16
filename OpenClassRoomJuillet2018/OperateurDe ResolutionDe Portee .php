<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>OperateurDeResolutionDePortee</title>
  </head>
  <body>

    <?php

      class Personnage
      {
////////   ATTRIBUTS    ////////////////////////////////////////////////////////
        public $_experience;
        public $_force;
        public $_degats;

////////   __CONSTRUCT (iniatilisateur)    ////////////////////////////////////////////////////////
        public function __construct($force, $degats)
        {
          echo "le coin \'__construct\' pour initialiser"
          $this->setForce($force);
          $this->setDegats($degats);
          $this->_experience = 1;
        }

////////   FUNCTION    ////////////////////////////////////////////////////////
        public function frapper(Personnage $PersoAFrapper)
        {
          $PersoAFrapper->_degats += $this->_force;
        }

////////   MUTATEUR    ////////////////////////////////////////////////////////
        public function setForce($force)
        {
          if(!is_int($force))
          {
            trigger_error("La force est bien un nombre entier", E_USER_WARNING);
            return;
          }
          if($force > 100) // Eviter d'avoir une valeur supérieure à 100
        }

////////   MUTATEUR    ////////////////////////////////////////////////////////
        public function force();
        {
          return $this->_force;
        }

      }

      $perso1 = new personnage;

      $perso1->setForce(30);
      $perso1->setExperience(15)

      $perso1->frapper($perso2);
      $perso1->gagnerExperience();

    ?>


  </body>
</html>
