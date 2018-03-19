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
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php
      /*récupère action dans l'Url*/
      /* index.php?action=home */
      $action = isset($_GET['action']) ? htmlentities($_GET['action']) : 'home';
      $id = isset($_GET['id']) ? htmlentities($_GET['id']) : '0';
      $keyword = isset($_GET['keyword']) ? htmlentities($_GET['keyword']) : '';
      $category = isset($_GET['category']) ? htmlentities($_GET['category']) : '';
      $category = html_entity_decode($category, ENT_HTML5, "utf-8");
      /*Apprel de la fonction Action du Controller*/
      /*passe le paramètre $action à la fonction*/
      Controller::Get()->Action($action);
     ?>
  </body>
</html>
