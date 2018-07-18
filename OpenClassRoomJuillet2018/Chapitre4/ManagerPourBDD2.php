<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hydrater Avec SQL</title>
  </head>
  <body>

    <?php

      class PersonnagesManager
      {
        private $_db;  /* Attribut, c'est ici qu'on instancie pour la PDO - BDD
                       db signifiant data base */

        public function __construct($db)
        {
          $this->setDb($Db); /* Lieu d'initialisation des données car Construct
                             initialise les attributs placés en haut*/
        }

        public function add(Personnage $perso)
        {
          // Insertion de requête
          $q = $this ->_db->prepare("INSERT INTO personnages(nom, forcePerso,
            degats, niveau, experience) VALUES(:nom, :forcePerso,
              :degats, :niveau, :experience)");

          // Assignation des valeurs (id, nom, date, force, degats, experience,...)
          $q->bindValue(":nom", $perso->nom());
          $q->bindValue(":forcePerso", $perso->forcePerso(), PDO::PARAM_INT);
          $q->bindValue(":degats", $perso->degats(), PDO::PARAM_INT);
          $q->bindValue(":niveau", $perso->niveau(), PDO::PARAM_INT);
          $q->bindValue(":experience", $perso->experience(), PDO::PARAM_INT);

          // Execution de la requête
          $q->execute();
        }

        public function delete(Personnage $perso)
        {
          // (PDO, Execute une requête de type DELETE)
          $this->_db->exec("DELETE FROM personnages WHERE id = ".$perso->id());
        }

        public function get($id)
        {
          /* Execute une requête de type SELECT avec une clause WHERE,
          et retourne */
          $id = (int) $id;

          $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau,
            experience FROM personnages WHERE id = '.$id);
          $donnees = $q->fetch(PDO::FETCH_ASSOC);

          return new Personnage($donnees);
        }

        public function getList()
        {
          /* retournela liste de tous les personnages enregistrés dans le
          tableaux de la PDO */
          $persos = [];

          $q = $this->_db->query("SELECT id, nom, forcePerso, degats, niveau,
            experience FROM personnages ORDER BY nom");

          while($donnees = $q->fetch(PDO::FETCH_ASSOC))
          {
            $persos[] = new Personnage($donnees);
          }
          return $persos;
        }

        public function update(Personnage $perso)
        {
          // Prépare une requête de type UPDATE.(modification / mise à jour)
          $q = $this->_db->prepare("UPDATE personnages SET
            forcePerso = :forcePerso,
            degats = :degats,
            niveau = :niveau,
            experience = :experience WHERE id = :id");
          // Assignation des valeurs modifiées pour la requête.
          $q->bindValue(":forcePerso", $perso->forcePerso(), PDO::PARAM_INT);
          $q->bindValue(":degats", $perso->degats(), PDO::PARAM_INT);
          $q->bindValue(":niveau", $perso->niveau(), PDO::PARAM_INT);
          $q->bindValue(":experience", $perso->experience(), PDO::PARAM_INT);
          $q->bindValue(":id", $perso->id(), PDO::PARAM_INT);

          // Execution de la requête (execute)
          $q->execute();
        }

        public function setDb(PDO $db)
        {
          $this->_db = $db;
        }
      }

    ?>


  </body>
</html>
