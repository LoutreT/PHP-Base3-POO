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
        public $_force;
        public $_localisation;
        public $_experience;
        public $_degats;

////// CONSTANTES DE CLASSE (et non d'objet qui est pondu par la classe) ///////
        const FORCE_PETITE = 20;
        const FORCE_MOYENNE = 50;
        const FORCE_GRANDE = 80;

////////   VARIABLE STATIQUE    ////////////////////////////////////////////////
        private static $_texteADire ="Je découvre la fonction
        statique dans le chapitre 3";

////////   __CONSTRUCT (iniatilisateur)    /////////////////////////////////////
        public function __construct($forceinitiale)
        {
          $this->setForce($forceinitiale);
          // $this->setDegats($degats);
          // $this->_experience = 1;
        }

////////   FUNCTION    /////////////////////////////////////////////////////////
        public function frapper(Personnage $PersoAFrapper)
        {
          // $PersoAFrapper->_degats += $this->_force;
        }

////////   MUTATEUR    /////////////////////////////////////////////////////////
        public function setForce($force)
        {
          if(!in_array($force,[self::FORCE_PETITE, self::FORCE_MOYENNE,
          self::FORCE_GRANDE]))
          {
              $this->_force = $force;
          }
        }

        public static function parler()
        {
          echo self::$_texteADire;
        }
      }

    ?>


  </body>
</html>
