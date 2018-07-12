<?php

  class Personnage
  {
    private $_id;
    private $_nom;
    private $_forcePerso;
    private $_degats;
    private $_niveau;
    private $_experience;


    /* Pour hydrater = pour assigner des valeurs aux attributs tels
    que $_id, $_nom, $_niveau, etc... par des valeurs venant d'un tableau My SQL.   */
    

    // Liste des getters :

    public function id()
    {
      return $this->_id;
    }

    public function nom()
    {
      return $this->_nom;
    }

    public function _forcePerso()
    {
      return $this->_forcePerso;
    }

    public function degats()
    {
      return $this->_degats;
    }

    public function niveau()
    {
      return $this->_niveau;
    }

    public function experience()
    {
      return $this->_experience;
    }


    // Liste des setters :
    public function setId($id)
    {
      // On converti l'argument en nombre entier.
      // Si c'en était déjà un, rien ne changera.
      /* Sinon, la conversion donnera le nombre 0 (à quelques exceptions près, mais rien d'important ici).*/

      //ci-dessous on assure que les nombres soient entiers.
      $this->id = (int)$id;
    }


    public function setNom($nom)
    {
      // On vérifie qu'il s'agit bien d'une chaine de de caractères
      if (is_string($nom) && strlen($nom) <= 30)
      {
        $this->_nom = $nom;
      }
    }

    public function setForcePerso($forcePerso)
    {
      $forcePerso = (int) $forcePerso;

      if($forcePerso >= 0 && $forcePerso <= 100)
      {
        $this->_forcePerso = $forcePerso;
      }
    }

    public function setDegats($degats)
    {
      $degats = (int) $degats;

      if ($degats >= 0 && $degats <= 100)
      {
        $this->_degats = $degats;
      }
    }

    public function setNiveau()
    {
      $niveau = (int) $niveau;

      if ($niveau >= 0)
      {
        $this->_niveau = $niveau;
      }
    }

    public function experience()
    {
      $experience = (int) $experience;

      if($experience >= 0 && $experience <= 100)
      {
        $this->_experience = $experience;
      }
    }

  }
?>

<?php
  request = $db->query("SELECT id, nom, forcePerso, degats, niveau, experience FROM personnage");

  while ($donnees = $request->fetch(PDO::FETCH_ASSOC))  // Chaque entrée sera récupérée et rangée dans un array.

  $perso = new Personnage ($donnees);

  echo $perso->nom(), 'a', $perso->forcePerso(),' de force ', $perso->degats(), 'degats', $perso->experience(), 'd\'experience et est au niveau ', $perso->niveau();
?>
