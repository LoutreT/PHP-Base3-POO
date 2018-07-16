<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>testREQUIREpooclass</title>
  </head>
  <body>


    <?php
      function allerchercherlaClasse($classe)
      {
        require 'révision16juillet.php';
      }
      spl_autoload_register('allerchercherlaClasse');

      $perso = new Personnage;
    ?>


  </body>
</html>
