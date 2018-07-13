<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Réentrainement PHP-POOclass</title>
  </head>
  <body>

  <?php


// auteur Vincent Nx (LoutreT)


    class Personnage            // Voilà ici je rentre dans une classe, un moule, pour créer un OBJET.
    {
      private $_force;          // et ici je crée des niveaux de propriétés...
      private $_localisation;   // ... de niveau 'private'.
      private $_experience;
      private $_degats;


      public function deplacer()  // ici je crée une méthode, une fonction.
      {                           // elle a aussi une propriété de niveau 'public'

      }


      public function frapper()   // ici je crée une seconde méthode, une fonction.
      {

      }


      public function gagnerExperience()  // ici je crée une 3e méthode, une fonction
      {

      }

    }

    $perso = new Personnage     // "new" indique au programme qu'il s'agit d'un nouvel Objet créé par la CLASS Personnage.
    $perso->parler();

  ?>

  </body>
</html>
