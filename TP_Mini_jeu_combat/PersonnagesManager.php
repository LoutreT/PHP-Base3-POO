<?php

  class PersonnagesManager{
    private $_db; // Instance de PDOStatement

    public function __construct($db){
      $this->setDb($db);
    }

    public function add(Personnage $perso){
      // Préparation de la requête d'insertion.
      $q->$this->_db->prepare('INSERT INTO personnages(nom) VALUES(:nom)');
      // Assignation des valeurs pour le nom du personnage.
      $q->binValue(':nom',$perso->nom());
      // Execution de la requête:
      $q->execute();

      // Hydratation du personnage passé en paramètre avec assignation de son identifiant et des dégâts initiaux (=0).
      $perso->hydrate(['
        id'=>$this->_db->lastInsertId(),
        'degats'=>0,]);
    }


    public function nomValide(){
      return !empty($this->_nom);
    }


    public function count(){
      // Execute une ( query = )requête COUNT( et retourne le nombre de résultats retourné.
      return $this->_db->query('SELECT COUNT(*) FROM personnages')->fetchColumn();
    }

    public function delete(Personnage $perso){
      // Execute une requête de type DELETE.
      $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id());
    }

    public function exists($info){
      // si le paramètre est un entier, c'est qu'on a fourni un identifiant.
      if(is_int($info)){ //On veut voir si tel personnage ayant pour id $info existe.

      // Sinon, c'est qu'on veut vérifier que le nom existe ou pas.
      $q = $this->_db->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');

      $q->execute([':nom' => $info]);

      return(bool)$q->fetchColumn();
      }
      // On execute alors une requête COUNT() avec une clause WHERE, et on retourne un booléen.

      // Sinon c'est qu'on a passé un nom.
      // Execution d'une requête COUNT() avec une clause WHERE, et retourne un booleen (VRAI / FAUX = TRUE / FALSE)
    }


    public function get($info){
      // si le paramètre est un entier, on veut récupérer le personnage avec son identifiant.
      if(is_int($info)){
      // Execute une requête de type SELECT avec une clause WHERE; et retourne un objet Personnage.
        $q = $this->_db->query('SELECT id, nom, degats FROM personnages WHERE id = '.$info);
        $donnees =$q->fetch(PDO::FETCH_ASSOC);

        return new Personnage($donnees);
      }
      else {
        $q = $this->_db->prepare('SELECT id, nom, degats FROM personnages WHERE nom = :nom');

        $q->execute([':nom' => $info]);
      }
    }


    public function getList($nom){
      // Retourne la liste des personnages dont le nom n'est pas $nom.
      $persos = [];

      // Le resultat sera un tableau d'instance de Personnage.
      $q = $this->_db->prepare('SELECT id, nom, degats FROM personnages WHERE nom <> :nom ORDER BY nom');

      $q->execute([':nom'=> $nom]);

      while($donnees=$q->fetch(PDO::FETCH_ASSOC)){
        $perso[] = new Personnage($donnees);
      }
    return $persos;
    }


    public function update(Personnage $perso){
      // Prépapre une requête de type UPDATE.
      $q->$this->_db->prepare('UPDATE personnages SET degats = :degats WHERE id = :id');

      // Assignation des valeurs à la requête.
      $q->bindValue(':degats', $perso->degats(),PDO::PARAM_INT);
      $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
      // Execution de la requête.
      $q->execute();
    }


    public function setDb(PDO $db){
      $this->_db = $db;
    }
  }

?>
