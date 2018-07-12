<?php
  require 'pdoTP-OpClRoom.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>TP-CHAP.5-OpenClassRoom</title>
  </head>
  <body>

    <?php
      class Personnage{
        private $_id,
                $_degats,
                $_nom;


        const CEST_MOI = 1;
        const PERSONNAGE_TUE = 2;
        const PERSONNAGE_FRAPPE = 3;


        public function __construct(array $donnees)
        {
          $this->hydrate($donnees);
        }


        public function frapper(Personnage $perso)
        {
          // On indique au personnage frappé qu'il doit recevoir des dégâts.
          if($perso->id() == $this->_id)
          {
            return self::CEST_MOI;
          }
          return $perso->recevoirDegats();
        }


        /* Pour hydrater = pour assigner des valeurs aux attributs tels
        que $_id, $_nom, $_niveau, etc... par des valeurs venant d'un tableau My SQL.   */
        public function hydrate(array $donnees)
        {
          foreach ($donnees as $key => $value)
          {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
              $this->$method($value);
            }
          }
        }


        public function recevoirDegats()
        {
          // On augmente de 5 les dégâts.
          $this->_degats += 5;
          // Si on a 100 de dégâts ou plus, la méthode renverra une valeur signifiant que le personnage a été tué.
          if(this->_degats >= 100)
          {
            return self::PERSONNAGE_TUE;
          }
          return self::PERSONNAGE_FRAPPE;
        }


        public function degats()
        {
          return $this->_degats;
        }


        public function id()
        {
          return $this->_id;
        }


        public function nom()
        {
          return $this->_nom;
        }


        public function setDegats($degats)
        {
          $degats = (int) degats;

          if(degats >= 0 && degats <= 100)
          {
            $this->_degats = $degats;
          }
        }


        public function SetId($id)
        {
          $id=(int)$id;

          if($id > 0)
          {
            $this->_id = $id;
          }
        }


        public function setNom($nom)
        {
          if(is_string($nom))
          {
            $this->_nom = $nom;
          }
        }
      }
    ?>

  </body>
</html>

Attaquons-nous maintenant à la deuxième grosse partie de ce TP, celle consistant à pouvoir stocker nos personnages dans une base de données. Grande question maintenant : comment faire ?

Au cas où certains seraient toujours tentés de placer les requêtes qui iront chercher les personnages en BDD dans la classePersonnage, je vous arrête tout de suite et vous fais un bref rappel avec cette phrase que vous avez déjà rencontrée : UNE CLASSE, UN RÔLE.

Comment va-t-on faire pour construire ces classes ? Quelles questions va-t-on se poser ?

    Quelles seront les caractéristiques d'un manager ?

    Quelles seront les fonctionnalités d'un manager ?

Les caractéristiques d'un manager

Encore une fois, ce point a été abordé dans la troisième partie du précédent chapitre. Allez y faire un tour si vous avez un trou de mémoire ! Voici le code de la classe contenant sa (grande) liste d'attributs.

< ?php
  class PersonnagesManager
{
  private $_db;
}
? >

Les fonctionnalités d'un manager:

Dans la troisième partie du précédent chapitre, nous avons vu quelques fonctionnalités de base. Notre manager pouvait :

  -  Enregistrer un nouveau personnage ;
  -  modifier un personnage ;
  -  supprimer un personnage ;
  -  sélectionner un personnage.

Cependant, ici, nous pouvons ajouter quelques fonctionnalités qui pourront nous être utiles :

  -  Compter le nombre de personnages ;
  -  récupérer une liste de plusieurs personnages ;
  -  savoir si un personnage existe.

Cela nous fait ainsi 7 méthodes à implémenter !
