<?php
session_start();
/*Constante qui représente les répertoires*/
define(VIEW, 'Views/');
define(CONTROLLER, 'Controllers/');
define(MODEL, 'Models/');

/*Importe le fichier Controller.php*/
/*Ce qui permet d'avoir accès au singleton Controller*/
require(CONTROLLER .'Controller.php' );
/*Importe le fichier Model.php*/
/*Ce qui permet d'avoir accès au singleton Model*/
require(MODEL .'Model.php' );

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      /*récupère action dans l'Url*/
      $action = isset($_GET['action']) ? htmlentities($_GET['action']) : 'home';
      /*Apprel de la fonction Action du Controller*/
      /*passe le paramètre $action à la fonction*/
      Controller::Get()->Action($action);
     ?>
  </body>
</html>
