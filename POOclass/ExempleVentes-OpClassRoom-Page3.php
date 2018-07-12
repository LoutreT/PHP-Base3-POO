<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exemple Class Compteur</title>
  </head>
  <body>


    <?php

      class Compteur
      {
        private static $_compteur = 0;

        public function __construct()
        {
          //On instancie la variable $compteur qui appartient à la classe (donc utilisation du mot-clé "self").
          self::$_compteur++;
        }

        public static function getCompteur()
        {
          return self::$_compteur++;
        }
      }

      $test1 = new Compteur;
      $test2 = new Compteur;
      $test3 = new Compteur;

      echo Compteur::getCompteur();

    ?>



  </body>
</html>
