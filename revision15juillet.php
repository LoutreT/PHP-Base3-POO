// Effacé ! A recommencer pour bien réviser.
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>





    <?php
      class Personnage
      {
        public $_attaquer = 30;
        public $_degats = 20;

        public function frapper(Personnage PersoAFrapper)
        {
          $this->_attaquer = $this->_attaquer + 5 ;
        }

                                 // L'ACCESSEUR permet de
        public function degats() // accesseur permettant d'utiliser la valeur...
                                 // ...de l'attribut degats au sein de la classe.
        {
          return $this->_degats;
        }
      }
      $perso01 = new Personnage
      $perso01->gagner()
    ?>





  </body>
</html>
