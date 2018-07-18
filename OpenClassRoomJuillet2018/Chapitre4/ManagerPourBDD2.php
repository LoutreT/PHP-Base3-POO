<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hydrater Avec SQL</title>
  </head>
  <body>

    <?php

      class PersonnageManager
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
          // Assignation des valeurs (id, nom, date, force, degats, experience,...)
          // Execution de la requête (return ?)
        }

        public function delete(Personnage $perso)
        {
          // (PDO, Execute une requête de type DELETE)
        }

        public function get($id)
        {
          /* Execute une requête de type SELECT avec une clause WHERE,
          et retourne */
        }

        public function getList()
        {
          /* retournela liste de tous les personnages enregistrés dans le
          tableaux de la PDO */
        }

        public function update(Personnage $perso)
        {
          // Prépare une requête de type UPDATE.(modification / mise à jour)
          // Assignation des valeurs modifiées pour la requête.
          // Execution de la requête.(return ?)
        }

        public function setDb(PDO $db)
        {
          $this->_db = $db;
        }
      }

    ?>


  </body>
</html>
