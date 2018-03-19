<?php
// $bdd = Model::Get()->Connection();
if(isset($_POST["btn_article"]))
{

  $insert = Model::Get()->InsertArticles($_POST);
}
 ?>

 <main class="main--admin">
   <h1>Articles</h1>
   <form class="form--article" action="index.php?action=admin" method="post">
     <label for="titre">titre</label><input type="text" name="titre" value="<?php echo isset($_POST['titre'])?$_POST['titre']:"";  ?>">
     <label for="description">description</label><textarea name="description" rows="8" cols="80" value=""><?php echo isset($_POST['description'])?$_POST['description']:"";  ?></textarea> 
     <label for="largeur">largeur : </label><input type="number" name="largeur" value="<?php echo isset($_POST['largeur'])?$_POST['largeur']:"0";  ?>">
     <label for="hauteur">hauteur : </label><input type="number" name="hauteur" value="<?php echo isset($_POST['hauteur'])?$_POST['hauteur']:"0";  ?>">
     <label for="profondeur">profondeur : </label><input type="number" name="profondeur" value="<?php echo isset($_POST['profondeur'])?$_POST['profondeur']:"0";  ?>">
     <label for="stock"> en stock : </label><input type="checkbox" name="stock" value="stock" checked>
     <label for="categorie">categories : </label><input type="text" name="categorie" value="<?php echo isset($_POST['categorie'])?$_POST['categorie']:"";  ?>"> 
     <label for="img">image : </label><input type="text" name="img[]" maxlength="256" value="<?php echo isset($_POST['img'])?$_POST['img'][0]:"";  ?>"> 
     <label for="img">image : </label><input type="text" name="img[]" maxlength="256" value="<?php echo isset($_POST['img'])?$_POST['img'][1]:"";  ?>"> 
     <label for="img">image : </label><input type="text" name="img[]" maxlength="256" value="<?php echo isset($_POST['img'])?$_POST['img'][2]:"";  ?>"> 
     <label for="img">image : </label><input type="text" name="img[]" maxlength="256" value="<?php echo isset($_POST['img'])?$_POST['img'][3]:"";  ?>"> 
     <label for="img">image : </label><input type="text" name="img[]" maxlength="256" value="<?php echo isset($_POST['img'])?$_POST['img'][4]:"";  ?>"> 
     <br/>
     <input class="input--admin" type="submit" name="btn_article" value="sauvegarder">
   </form>
 </main>
