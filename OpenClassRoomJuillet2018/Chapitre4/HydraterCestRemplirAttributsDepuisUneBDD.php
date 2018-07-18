<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hydrater Avec SQL</title>
  </head>
  <body>

    <?php
    // …
    public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
      // On récupère le nom du setter correspondant à l'attribut.
        $method = 'set'.ucfirst($key);

      // Si le setter correspondant existe.
        if (method_exists($this, $method))
        {
          // On appelle le setter.
          $this->$method($value);
        }
      }
    }
    
    ?>

  </body>
</html>
