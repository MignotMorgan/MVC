<?php
/*classe abstraite AbstractModel*/
abstract class AbstractModel
{
  abstract public function Articles();
  abstract public function Categorie($category);
  abstract public function KeyWord($keyword);
}

/*Charge la classe MyModel*/
require('MyModel.php');

/*Singleton d'une classe dérivée de AbstracModel*/
/*Utilisation pour accéder au Model : */
/*--- Model::Get() ---*/
final class Model
{
  static $value;
  public static function Get()
  {
    if(!isset($value))
      $value = new MyModel();
      return $value;
  }
}
 ?>
