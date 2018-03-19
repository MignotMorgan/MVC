<?php
class MyController extends AbstractController
{
/*fonction qui affiche le header*/
/*paramètre $header = "menu" ou "vcard"*/
  public function Header($header)
  {
    switch($header)
    {
      case 'menu':
        require(VIEW .'header_menu.php');
        break;
      case 'vcard':
        require(VIEW .'header_vcard.php');
        break;
      case '':
        break;
    }
  }
  /*fonction qui compose les vues en page*/
  /*cette fonction est appeler par index.php*/
  /*paramètre $action = la page*/
  public function Action($action)
  {
    switch($action)
    {
      case 'home':
        $this->Header('vcard');
        require(VIEW .'home.php');
        require(VIEW .'citation.php');
        $this->Footer();
        break;
      case 'presentation':
        $this->Header('menu');
        require(VIEW .'presentation.php');
        $this->Footer();
        break;
      case 'contact':
        $this->Header('menu');
        require(VIEW .'contact.php');
        include(VIEW .'map.php');
        $this->Footer();
        break;
      case 'stock':
        $this->Header('menu');
        require(VIEW .'stock.php');
        $this->Footer();
        break;
      case 'last':
        $this->Header('menu');
        require(VIEW .'last_articles.php');
        $this->Footer();
        break;
      case 'admin':
        $this->Header('menu');
        require(VIEW .'admin.php');
        $this->Footer();
        break;
      case 'article':
        $this->Header('menu');
        require(VIEW .'article.php');
        $this->Footer();
        break;
      case 'categories':
        $this->Header('menu');
        require(VIEW .'categories.php');
        $this->Footer();
        break;    
      }
  }
  /*fonction qui affiche le footer*/
  /*paramètre $footer*/
  public function Footer($footer)
  {
    switch($footer)
    {
      case '' :
        require(VIEW .'footer.php');
        break;
    }
  }
}


 ?>
