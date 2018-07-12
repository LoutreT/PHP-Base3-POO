<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exemple Class Compteur</title>
  </head>
  <body>

    <form class="" action="index.html" method="post">
      <input type="text" name="" value="">
    </form>


    <?php

      class Magasin
      {
        private static $_ventesTotales = 0;

        public function __construct($ventes)
        {
          //On instancie la variable $compteur qui appartient à la classe (donc utilisation du mot-clé "self").
          self::$_ventesTotales = self::$_ventesTotales + $ventes;
        }

        public static function getVentes()
        {
          return self::$_ventesTotales;
        }
      }

      $test1 = new Magasin(2000);
      $test2 = new Magasin(5000);

      echo Magasin::getVentes() . "<br>";

      $test3 = new Magasin(600);
      $test4 = new Magasin(9000);

      echo Magasin::getVentes()  . "<br>" . "<br>";

    ?>



  </body>
</html>
