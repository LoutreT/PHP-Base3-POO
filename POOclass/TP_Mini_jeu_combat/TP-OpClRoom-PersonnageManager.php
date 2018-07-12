CONSTRUCTION d'une classe par la réflexion du cheminement :


<?php

  class PersonnagesManager{
    private $_db; // Instance de PDOStatement

    public function __construct($_db){
      $this->setDb($db);
    }

    public function add(Personnage $perso){
      // Préparation de la requête d'insertion. (fonction ?)
      // Assignation des valeurs pour le nom du personnage. (fonction ?)
      // Execution de la requête. (return ?)

      // Hydratation du personnage passé en paramètre avec assignation de son identifiant et des dégâts initiaux (=0).
    }

    public function count(){
      // Execute une requête COUNT( et retourne le nombre de résultats retourné.
    }

    public function delete(){
      // Execute une requête de type DELETE.
    }

    public function exist($info){
      // si le paramètre est un entier, c'est qu'on a fourni un identifiant.
      // On execute alors une requête COUNT() avec une clause WHERE, et on retourne un booléen.
      // Sinon c'est qu'on a passé un nom.
      // Execution d'une requête COUNT() avec une clause WHERE, et retourne un booleen (VRAI / FAUX = TRUE / FALSE)
    }

    public function get($info){
      // si le paramètre est un entier, on veut récupérer le personnage avec son identifiant.
      // Execute une requête de type SELECT avec une clause WHERE; et retourne un objet Personnage.
    }

    public getList($nom){
      // Retourne la liste des personnages dont le nom n'est pas $nom.
      // Le resultat sera un tableau d'instance de Personnage.
    }

    public function update(Personnage $perso){
      // Prépapre une requête de type UPDATE.
      // Assignation des valeurs à la requête.
      // Execution de la requête.
    }

    public function setDb(PDO $db){
      this->_db = $db;
    }
  }

?>
