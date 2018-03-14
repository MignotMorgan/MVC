<?php
class MyController extends AbstractController
{
/*fonction qui affiche le header*/
/*paramètre $header*/
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
  public function Action($action)
  {
    switch($action)
    {
      case 'home':
        $this->Header('vcard');
        require(VIEW .'home.php');
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
