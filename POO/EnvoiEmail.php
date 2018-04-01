<?php

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))

{

    $passage_ligne = "\r\n";

}

else

{

    $passage_ligne = "\n";

}
?>
