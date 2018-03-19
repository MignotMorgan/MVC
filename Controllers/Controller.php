<?php
/*classe abstraite AbstractModel*/
abstract class AbstractController
{
  abstract public function Header($header);
  abstract public function Action($action);
  abstract public function Footer($footer);
}

/*Charge la classe MyController*/
require('MyController.php');

/*Singleton d'une classe dérivée de AbstracController*/
/*Utilisation pour accéder au Controller : */
/*--- Controller::Get() ---*/
final class Controller
{
  static $value;
  public static function Get()
  {
    if(!isset($value))
      $value = new MyController();
    return $value;
  }
}

?>
