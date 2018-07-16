// Effacé ! A recommencer pour bien réviser.
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

     <!--
     De ce que j'ai vu, il faut mettre dans l'ordre suivant les groupes :
        - Attribut avec leur propriété (public-private-protected)
        - Fonction avec leur propriété (public-private-protected)
        - Mutateur, pour transformer la valeur de l'attribut.
        - Accesseur pour
     -->

    <?php
      class Personnage
      {
        private $_force;
        private $_experience;
        private $_degats;

        public function frapper(Personnage $PersoAFrapper)
        {
          $PersoAFrapper->_degats += $this->_force ;
        }

        public function gagner()
        {
          $this->_experience++;
        }


        public function setForce($force)  // ici setForce permet de muter, c'est
        {                                 //  un MUTATEUR
          return $this->_force
        }

                                 // L'ACCESSEUR (Getters) permet de
        public function force() // accesseur permettant d'utiliser la valeur...
        {                        // ...de l'attribut degats au sein de la classe.
          return $this->_force;
        }

        public function experience()
        {
          return $this->_experience;
        }

        public function degats()
        {
          return $this->_degats;
        }

      }
      $perso01 = new Personnage
      $perso02 = new Personnage

      $perso01->gagner()
      $perso02->setForce(10); // ici la force vaut 10

      $perso02->gagner()

      $perso01->gagner()
    ?>





  </body>
</html>
