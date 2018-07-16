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
        - Accesseur pour voir l'attribut.
     -->

    <?php
      class Personnage
      {
/////   LES ATTRIBUTS   ///////////////////////////////////////////////////////
        private $_force = 15;
        private $_experience = 10;
        private $_degats = 12;

/////   LES FONCTIONS   ///////////////////////////////////////////////////////
        public function frapper(Personnage $persoAFrapper)
        {
          $persoAFrapper->_degats += $this->_force ;
        }

        public function gagnerExperience()
        {
          $this->_experience++;
        }

/////   LES MUTATEURS   ///////////////////////////////////////////////////////
        public function setForce($force)  // ici setForce permet de muter, c'est
        {                                 //  un MUTATEUR
          if(!is_int($force))  // integer pour limiter aux nombres entiers
          {
            trigger_error("La force d un personnage doit etre un nombre entier",E_USER_WARNING);
            return;
          }
          if($force > 100)
          {
            trigger_error("La force d un personnage ne peut dépasser 100",E_USER_WARNING);
            return;
          }
          $this->_force = $force;
        }

        public function setExperience($experience)
        {
          if(!is_int($experience))
          {
            trigger_error("La force d un personnage doit etre un nombre entier",E_USER_WARNING);
            return;
          }
          if ($experience > 100)
          {
            trigger_error("La force d un personnage ne peut dépasser 100",E_USER_WARNING);
            return;
          }
          $this->_experience = $experience;
        }

/////   LES ACCESSEURS   //////////////////////////////////////////////////////
                                 // L'ACCESSEUR (Getters) permet de
        public function force() // accesseur permettant d'utiliser la valeur...
        {                        // ...de l'attribut force au sein de la classe.
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

/////    NEW OBJET GRACE A LA CLASSE   ////////////////////////////////////////
      $perso1 = new Personnage;
      $perso2 = new Personnage;

      $perso1->setForce(10);
      $perso1->setExperience(2);

      $perso2->setForce(90);
      $perso2->setExperience(58);

      $perso1->frapper($perso2);
      $perso1->gagnerExperience();

      $perso2->frapper($perso1);
      $perso2->gagnerExperience();

//////////// Ci-dessous, juste affichage des valeurs des attributs grace aux accesseurs :
      echo "Le personnage 1 a", $perso1->force(), " de force, mais le personnage 2 a", $perso2->force()," de force.<br/>";

      echo "Le personnage 1 a", $perso1->experience(), " d experience, mais le personnage 2 a", $perso2->experience()," d experience.<br/>";

      echo "Le personnage 1 a", $perso1->degats(), " de degats, mais le personnage 2 a", $perso2->degats()," de degats.<br/>";

    ?>


  </body>
</html>
