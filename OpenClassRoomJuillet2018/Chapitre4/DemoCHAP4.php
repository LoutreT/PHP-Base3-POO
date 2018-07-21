<?php

class Personnage
{
	private $_id;
	private $_nom;
	private $_forcePerso;
	private $_degats;
	private $_niveau;
	private $_experience;

	public function __construct(array $data)
	{
		$this->hydrate($data);
	}

	// Un tableau de donnees doit etre passe a  la fonction (d'ou le prefixe Â« array Â»).
	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			// On recupere le nom du setter correspondant Ã  l'attribut.
			$method = 'set'.ucfirst($key);

			// Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
	}

	public function id() { return $this->_id; }
	public function nom() { return $this->_nom; }
	public function forcePerso() { return $this->_forcePerso; }
	public function degats() { return $this->_degats; }
	public function niveau() { return $this->_niveau; }
	public function experience() { return $this->_experience; }

	public function setId($id)
	{
		// L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
		$this->_id = (int) $id;
	}

	public function setNom($nom)
	{
		// On verifie qu'il s'agit bien d'une chaine de caracteres.
		// Dont la longueur est inferieure Ã  30 caracteres.
		if (is_string($nom) && strlen($nom) <= 30)
		{
			$this->_nom = $nom;
		}
	}

	public function setForcePerso($forcePerso)
	{
		$forcePerso = (int) $forcePerso;

		// On verifie que la force passee est comprise entre 0 et 100.
		if ($forcePerso >= 0 && $forcePerso <= 100)
		{
			$this->_forcePerso = $forcePerso;
		}
	}

	public function setDegats($degats)
	{
		$degats = (int) $degats;

		// On verifie que les degats passes sont compris entre 0 et 100.
		if ($degats >= 0 && $degats <= 100)
		{
			$this->_degats = $degats;
		}
	}

	public function setNiveau($niveau)
	{
		$niveau = (int) $niveau;

		// On verifie que le niveau n'est pas negatif.
		if ($niveau >= 0)
		{
			$this->_niveau = $niveau;
		}
	}

	public function setExperience($exp)
	{
		$exp = (int) $exp;

		// On verifie que l'experience est comprise entre 0 et 100.
		if ($exp >= 0 && $exp <= 100)
		{
			$this->_experience = $exp;
		}
	}
}
?>

<?php
/*############################################################################*/

class PersonnagesManager
{
	private $_db; // Instance de PDO

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function add(Personnage $perso)
	{
		$q = $this->_db->prepare(
      'INSERT INTO personnages
				(nom, forcePerso, degats, niveau, experience)
			VALUES
				(:nom, :forcePerso, :degats, :niveau, :experience)
		');

		$q->bindValue(':nom', $perso->nom(), PDO::PARAM_STR);
		$q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
		$q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
		$q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
		$q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);

		$q->execute();
		
		if ($q->rowCount() == 1) { // suggestion Caroline
			echo 'Perso added.';     // suggestion
		} else {                   // suggestion
			echo 'Failed.'           // suggestion
		}
	}

	public function delete(Personnage $perso)
	{
		$this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id());
	}

	public function get($id)
	{
		$id = (int) $id;
		$q = $this->_db->query(
      'SELECT
				id, nom, forcePerso, degats, niveau, experience
			FROM
				personnages
			WHERE
				id = '.$id
		);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);

		return new Personnage($donnees);
	}

	public function getList()
	{
		$persos = [];

		$q = $this->_db->query(
			'SELECT
				id, nom, forcePerso, degats, niveau, experience
			FROM
				personnages
			ORDER BY
				nom
		');

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$persos[] = new Personnage($donnees);
		}

		return $persos;
	}

	public function update(Personnage $perso)
	{
		$q = $this->_db->prepare(
			'UPDATE
				personnages
			SET
				forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience
			WHERE
				id = :id
		');

		$q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
		$q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
		$q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
		$q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
		$q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

		$q->execute();
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
?>

<?php
/*############################################################################*/

	/* INDEX.PHP */

$perso = new Personnage([
  'nom' => 'Victor',
  'forcePerso' => 5,
  'degats' => 0,
  'niveau' => 1,
  'experience' => 0
]);

$db = new PDO('mysql:host=localhost;dbname=tests', 'root', '');

$manager = new PersonnagesManager($db);

$manager->add($perso);

?>
<!--#########################################################################-->

<!--
	Voici ce qu'il va ce passer 'dans la tete de PHP', a  la lecture d'index.php :


		$perso = new Personnage([
		  'nom' => 'Victor',
		  'forcePerso' => 5,
		  'degats' => 0,
		  'niveau' => 1,
		  'experience' => 0
		]);

    -> $perso = 'new Personnage' = creation/instanciation d'un objet Personnage,
        sur base de la classe du meme nom, a stocker dans
        une variable appelee '$perso'.

		-> La classe Personnage a-t-elle un constructeur, c'est a  dire des
        instruction specifiques pour moi ? Oui, theoriquement on a du me passer
        un array en parametre quand 'new Personnage' a ete ecrit.

		-> Le constructeur me dit que je dois appeler la fonction hydrate() en lui
       passant l'array que j'ai recu

		-> La fonction hydrate() me dit que pour chaque index dans l'array $data, je
       dois voir s'il existe une fonction qui s'appelle set***(),
       avec le nom de l'index a la place de ** et la premiere lettre en
       majuscule, et si oui, l'appeler

		-> Les setters que j'appelle les uns apres les autres remplissent les
       attributs de l'objet Personnage que je construis, avec des verifications


		$manager = new PersonnagesManager($db);
		-> Meme chose : constructeur de PersonnagesMAnager avec $db en parametre


		$manager->add($perso);
		-> je dois maintenant appeler la fonction add() de $manager en lui
    passant l'objet $perso que j'ai cree
-->
