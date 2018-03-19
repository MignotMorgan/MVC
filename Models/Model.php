<?php
/*classe abstraite AbstractModel*/
abstract class AbstractModel
{
  abstract protected function Connection();
  abstract public function Articles();
  abstract public function Article($id);
  abstract public function Categorie($id);
  abstract public function Categories($category);
  abstract public function KeyWord($keyword);
  abstract public function LastArticles();
}

/*Charge la classe MyModel*/
require('MyModel.php');

/*Singleton d'une classe dérivée de AbstracModel*/
/*Utilisation pour accéder au Model : */
/*    Model::Get()    */
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
