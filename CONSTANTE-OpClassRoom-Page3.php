<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Constante-Page3</title>
  </head>
  <body>

    <?php

      class Personnage
      {
        private $_force;
        private $_localisation;
        private $_experience;
        private $_degats;

        const FORCE_PETITE = 20;
        const FORCE_MOYENNE = 50;
        const FORCE_GRANDE = 80;

        private static $_textADire ='je vais tous vous tuer !';  // On donne le texte à dire.

        public function __construct($forceInitiale)
        {
          $this->setForce($forceInitiale);
        }

        public function deplacer()
        {

        }

        public function frapper()
        {

        }

        public function gagnerExperience()
        {

        }

        public function setForce($force)
        {
          /* On vérifie qu'on nous donne bien soit une « FORCE_PETITE »,
          soit une « FORCE_MOYENNE », soit une « FORCE_GRANDE »    */
          if(in_array($force,[self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE]))
          {
            $this->_force = $force;
          }
        }
        public static function parler()
        {
          echo self::$_textADire;     // On donne le texte à dire.
        }
      }

      /* On envoie une FORCE_MOYENNE en guise de force initiale */
      $perso = new Personnage(Personnage::FORCE_MOYENNE);
      $perso->parler();

    ?>


  </body>
</html>
