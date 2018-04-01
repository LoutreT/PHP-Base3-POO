<?php
// On enregistre notre autoload.
function chargerClasse($classname){
  require $classname.'.php';
}

spl_autoload_register('chargerClasse');

session_start();  // On appelle session_start()après avoir enregistré l'autoload

if(isset($_GET['deconnexion'])){
  session_destroy();
  header('Location: .');
  exit();
}

if(isset($_SESSION['perso'])) { // SI la session perso existe, on restaure l'objet
  $perso = $_SESSION['perso'];
}

$db = new PDO('mysql:host=localhost;dbname=combats','root','user');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué

$manager = new PersonnagesManager($db);

if(isset($_SESSION['perso'])){ // Si la session existe, on restaure l'objet
  $perso = $_SESSION['perso'];
}

if(isset($_POST['creer']) && isset($_POST['nom'])) //  Si on a voulu créer un personnage
{
  $perso = new Personnage(['nom'=>$_POST['nom']]); // On crée un nouveau personnages

  if(!$perso->nomValide()){
    $message='le nom choisi est invalide';
    unset($perso);
  }
  elseif($manager->exists($perso->nom())){
    $message='le nom du personnage est déjà pris';

    unset($perso);
  }
  else{
    $manager->add($perso);
  }
}

elseif(isset($_POST['utiliser']) &&  isset($_POST['nom'])){ // Si on a voulu utiliser un personnage.
  if($manager->exists($_POST['nom'])){// Si on a voulu utiliser un personnage
    $perso = $manager->get($_POST['nom']);
  }
  else {
  $message='Ce personnage n\'existe pas!';  // S'il n'existe pas, on affichera ce message
  }
}

elseif (isset($_GET['frapper'])){ // si on a cliqué sur un personnage pour le frapper
  if(!isset($perso)){
    $message ='Merci de créer un personnage ou de vous identifier.';
  }


  else{
    if(!$manager->exists((int) $_GET['frapper'])){
      $message='Le personnage que vous voulez frapper n\'existe pas!';
    }

    else{
      $persoAFrapper = $manager->get((int) $_GET['frapper']);

      $retour=$perso->frapper($persoAFrapper);  // On stocke dans $retour les éventuelles erreurs ou messages que renvoie la méthode frapper.


      switch($retour){
        case Personnage::CEST_MOI :
          $message='Mais... pourquoi voulez-vous frapper ???';
          break;

        case Personnage::PERSONNAGE_FRAPPE :
          $message = 'Le personnage a bien été frappé !';

          $manager->update($perso);
          $manager->update($persoAFrapper);
          break;

        case Personnage::PERSONNAGE_TUE :
          $message='vous avez tué ce personnage!';

          $manager->update($perso);
          $manager->delete($persoAFrapper);
          break;

        }
      }
  }
}
?>

OK ?

<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combats</title>

    <meta charset="utf-8">

  </head>
  <body>

    <p>Nombre de personnages créés : <?= $manager->count() ?></p>

    <?php
      if (isset($message)){ // A t'on un message à afficher ?
      {
        echo'<p>', $message,'</p>' ; // Si oui, on l'affiche.
      }
      if(isset($perso)) // SI on utilise un personnage (nouveau ou pas)
      {
    ?>

    <fieldset>
      <legend>Mes informations</legend>
      <p>
        Nom : <?= htmlspecialchars($perso->nom()) ?><br>
        Degats : <?= $perso->degats() ?>
      </p>
    </fieldset>

    <fieldset>
      <legend>Qui frapper ?</legend>
      <p>
        <?php
        $persos = $manager->getList($perso->nom());

        if(empty($persos)){
          echo 'Personne à frapper!';
        }
        else{
          foreach($persos as $unPerso)
          echo'<a href="?frapper=', $unPerso->id(), ' ">', htmlspecialchars($unPerso->nom()),'</a> (degâts : ', $unPerso->degats(), ')<br>';
        }
        ?>
      </p>
    </fieldset>

  <?php
  }
  else {
  ?>

    <form class="" action="" method="post">
      <p>
      Nom : <input type="text" name="nom" maxlength="50" value="">
      <input type="submit" value="Créer ce personnage" name="créer">
      <input type="submit" value="Utiliser ce personnage" name="utiliser">
      </p>
    </form>

  <?php
  }
  ?>

  </body>
</html>

<?php
  if(isset($perso)){ // Si on a créé un personnage, on le stocke dans une variable session afin d'économiser une requête SQL.
    $_SESSION['perso'] = $perso;
}
}
?>
