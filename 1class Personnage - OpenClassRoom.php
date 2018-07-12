<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>class Personnage - OpClaRoom</title>
  </head>
  <body>

  <div id="Personnage">

    <div class="Personnage1">
      Ici, un modèle simple où 3 objets (de niveau privé/private) et une méthode "parler" constituant une classe.<br><br>
    <?php

      class Personnage1
      {
        private $_force;
        private $_localisation = 'Lyon';
        private $_experience;

        public function parler()
        {
          echo'je suis un personnage1 !';
        }
      }
      $perso1 = new Personnage1;
      $perso1 -> parler()

    ?>

    </div>
______________________________________

    <div class="Personnage2">
      Ici, un modèle simple pour la seule fonction "Experience" appelée objet/attribut/variable.<br><br>
    <?php

      class Personnage2
      {
        private $_experience;

        public function afficherExperience()
        {
          echo $this->_experience;
        }

        public function gagnerExperience()
        {
          $this->_experience = $this->_experience + 1 ;
        }

      }
      $perso2 = new Personnage2;
      $perso2 -> gagnerExperience();
      $perso2 -> afficherExperience();

    ?>

    </div>

    ______________________________________

    <div class="Personnage3">
      Ici, un modèle simple pour la seule fonction rappel "Experience" pour "Gagner Experience".<br><br>
      <?php
        class Personnage3
        {
          private $_degats=0;
          private $_experience=0;
          private $_force=20;

          public function gagnerExperience()
          {
            $this->_experience = $this->_experience + 1;
          }
        }
      ?>
    </div>
    ______________________________________

    <div class="Personnage4">
      Ici, un modèle simple pour la seule fonction "Accesseur", pour accéder aux attributs encapsulés dans la classe "Personnage4".<br><br>
      <?php
        class Personnage4
        {
          private $_force=20;
          private $_experience=0;
          private $_degats=0;

          public function frapper(Personnage4 $perso4AFrapper)
          {
            $perso4AFrapper->_degats += $this->_force;
          }

          public function gagnerExperience()
          {
            $this->_experience++;
          }

          public function degats()
          {
            return $this->_degats;     //Accéder à un attribut = Accesseur
          }

          public function force()
          {
            return $this->_force;      //Accéder à un attribut = Accesseur
          }

          public function experience()
          {
            return $this->_experience;  //Accéder à un attribut = Accesseur
          }
        }
      ?>
    </div>

    ______________________________________

    <div class="Personnage5">
      Ici, un modèle simple pour les fonctions "Accesseur" "Mutateur", pour accéder aux attributs encapsulés dans la classe "Personnage5".<br><br>
      <?php
        class Personnage5
        {
          private $_force;
          private $_experience;
          private $_degats;

          public function frapper(Personnage5 $perso5AFrapper)
          {
            $perso5AFrapper->_degats += $this->_force;
          }

          public function gagnerExperience()
          {
            $this->_experience++;
          }


            // Mutateur chargé de modifier l'attribut $_force.
          public function setForce($force)
          {
            if(!is_int($force))  //S'il ne s'agit pas d'un nombre entier.
            {
              trigger_error('La force d\'un personnage5 doit être un nombre entier',E_USER_WARNING);
              return;
            }
            if($force>100)
            /*On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100*/
            {
              trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
              return;
            }

            $this->_force=$force;
          }


            // Mutateur chargé de modifier l'attribut $_experience.
          public function setExperience($experience)
          {
            if(!is_int($experience))  //S'il ne s'agit pas d'un nombre entier.
            {
              trigger_error('L\'expérience d\'un personnage5 doit être un nombre entier',E_USER_WARNING);
              return;
            }
            if($experience>100)
            /*On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100*/
            {
              trigger_error('L\'experience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
              return;
            }

            $this->_experience=$experience;
          }


          public function degats()
          {
            return $this->_degats;     //Accéder à un attribut = Accesseur
          }
          public function force()
          {
            return $this->_force;      //Accéder à un attribut = Accesseur
          }
          public function experience()
          {
            return $this->_experience;  //Accéder à un attribut = Accesseur
          }
        }
      ?>
    </div>

    ______________________________________

    <div class="Personnage6">
      Ici, un modèle simple pour les fonctions "Accesseur" "Mutateur", pour accéder aux attributs encapsulés dans la classe "Personnage6".<br><br>
      <?php
        class Personnage6
        {
          private $_force;
          private $_experience;
          private $_degats;

          public function frapper(Personnage6 $perso6AFrapper)
          {
            $perso6AFrapper->_degats += $this->_force;
          }

          public function gagnerExperience()
          {
            $this->_experience++;
          }


            // Mutateur chargé de modifier l'attribut $_force.
          public function setForce($force)
          {
            if(!is_int($force))  //S'il ne s'agit pas d'un nombre entier.
            {
              trigger_error('La force d\'un personnage5 doit être un nombre entier',E_USER_WARNING);
              return;
            }
            if($force>100)
            /*On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100*/
            {
              trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
              return;
            }

            $this->_force=$force;
          }


            // Mutateur chargé de modifier l'attribut $_experience.
          public function setExperience($experience)
          {
            if(!is_int($experience))  //S'il ne s'agit pas d'un nombre entier.
            {
              trigger_error('L\'expérience d\'un personnage5 doit être un nombre entier',E_USER_WARNING);
              return;
            }
            if($experience>100)
            /*On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100*/
            {
              trigger_error('L\'experience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
              return;
            }

            $this->_experience=$experience;
          }


          public function degats()
          {
            return $this->_degats;     //Accéder à un attribut = Accesseur
          }
          public function force()
          {
            return $this->_force;      //Accéder à un attribut = Accesseur
          }
          public function experience()
          {
            return $this->_experience;  //Accéder à un attribut = Accesseur
          }
        }
        $perso11 = new Personnage6;
        $perso12 = new Personnage6;

        $perso11->setForce(10);
        $perso11->setExperience(2);

        $perso12->setForce(90);
        $perso12->setExperience(58);

        $perso11->frapper($perso12);
        $perso11->gagnerExperience();

        $perso12->frapper($perso11);
        $perso12->gagnerExperience();

        echo "Le personnage 11 a ", $perso11->force() ," de force, contrairement au personnage 12 qui a ", $perso12->force()," de force.<br>";
        echo "Le personnage 11 a ", $perso11->experience() ," d'expérience, tandis que le personnage 12 a ", $perso12->experience()," d'experience.<br>";
        echo "Le personnage 11 a ", $perso11->degats()," de dégâts, comparé au personnage 2 qui a ", $perso12->degats()," de dégâts.<br>";
      ?>

    </div>



  </div>

  </body>
</html>
