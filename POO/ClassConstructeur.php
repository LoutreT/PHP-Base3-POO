<?php
  function ClassConstructeur($classe)
  {
    require $classe . '.php';
  }

  spl_autoload_register('chargerClasseYes');

  $perso11 = new Personnage6;

?>
