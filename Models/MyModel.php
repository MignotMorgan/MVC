<?php
class MyModel extends AbstractModel
{
  protected function Connection()
  {
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=morgan;charset=utf8', 'root', 'root');
      // $bdd = new PDO('mysql:host=localhost;dbname=MVC_articles;charset=utf8', 'root', 'user');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
  }
  public function Articles()
  {

  }
  public function Article($id)
  {
    $bdd = $this->Connection();

    $req = $bdd->prepare('SELECT *
                          FROM articles
                          WHERE articles.id = :id
                          ');
    $req->execute(['id' => $id]);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function Images($id)
  {
    $bdd = $this->Connection();

    $req = $bdd->prepare('SELECT *
                          FROM images
                          WHERE images.articles_id = :id
                          ');
    $req->execute(['id' => $id]);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function Categorie($id)
  {
    $bdd = $this->Connection();
    $req = $bdd->prepare('SELECT categories.name
                          FROM art_cat
                          INNER JOIN categories
                          ON art_cat.categories_id = categories.id
                          WHERE art_cat.articles_id = :id
                          ');
    $req->execute(['id' => $id]);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }

  /*envoi les articles de la catégorie $category */
  public function Categories($category)
  {
    $bdd = $this->Connection();
    $req = $bdd->prepare('SELECT articles.id, articles.titre, MIN(images.url) as "url"
                          FROM articles 
                          INNER JOIN images 
                          ON articles.id = images.articles_id 
                          INNER JOIN art_cat 
                          ON articles.id = art_cat.articles_id 
                          INNER JOIN categories
                          ON categories.id = art_cat.categories_id
                          WHERE categories.name = :category
                          GROUP BY articles.id
                          ORDER BY articles.datetime DESC
                        ');

    $req->execute(['category' => $category]);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function KeyWord($keyword)
  {
    $bdd = $this->Connection();
    $req = $bdd->prepare('SELECT articles.id, articles.titre, MIN(images.url) as "url"
                          FROM articles 
                          INNER JOIN images 
                          ON articles.id = images.articles_id 
                          WHERE articles.description LIKE :keyword
                          GROUP BY articles.id
                          ORDER BY articles.datetime DESC
                        ');

    $req->execute(['keyword' => '%'.$keyword.'%']);
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function LastArticles()
  {
    $bdd = $this->Connection();
    $req = $bdd->prepare('SELECT articles.id, articles.titre, MIN(images.url) as "url"
                          FROM articles 
                          INNER JOIN images 
                          ON articles.id = images.articles_id 
                          GROUP BY articles.id
                          ORDER BY articles.datetime DESC
                        ');

    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  public function Catalogues()
  {
    $bdd = $this->Connection();
    $req = $bdd->prepare('SELECT categories.id, categories.name, COUNT(art_cat.categories_id) as "count"
                          FROM categories 
                          LEFT JOIN art_cat 
                          ON categories.id = art_cat.categories_id
                          GROUP BY categories.id
                        ');

    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
  
  /*fonction pour inserer un article*/
  /*paramètre : $tab_Articles = array */
  /*-------format du tableau-------*/

 // [titre] => "titre",
 // [description] => "une description.",
 // [largeur] => 300,
 // [hauteur] => 112,
 // [profondeur] => 61,
 // [stock] => "stock";
 // [categorie] => "première categorie, deuxième catégorie, troisième catégorie",
 // [img] => Array
 //     (
 //         [0] => "url image",
 //         [1] => "url image",
 //         [2] => "url image",
 //         [3] => "url image",
 //         [4] => "url image"
 //     )

  public function InsertArticles($tab_Articles)
  {
    $bdd = $this->Connection();
    $req = $bdd->prepare('INSERT INTO articles(titre, description, largeur, hauteur, profondeur, stock) VALUES(:titre, :description, :largeur, :hauteur, :profondeur, :stock)');
    $insert = $req->execute(array(
                          'titre' => $tab_Articles['titre'],
                          'description' => $tab_Articles['description'],
                          'largeur' => $tab_Articles['largeur'],
                          'hauteur' => $tab_Articles['hauteur'],
                          'profondeur' => $tab_Articles['profondeur'],
                          'stock' => "1"
                        ));
    if($insert)
    {
      $req = $bdd->prepare('SELECT * FROM articles ORDER BY id DESC');
      $req->execute();
      $data = $req->fetchAll();
      $id = $data[0]['id'];
    
      $img = $tab_Articles['img'];
    
      $req = $bdd->prepare('INSERT INTO images(articles_id, url)
                            VALUES(:articles_id0, :url0),
                                  (:articles_id1, :url1),
                                  (:articles_id2, :url2),
                                  (:articles_id3, :url3),
                                  (:articles_id4, :url4);
                            ');
      $req->execute(array(
                          'articles_id0' => $id,
                          'url0' => $tab_Articles['img'][0],
                          'articles_id1' => $id,
                          'url1' => $tab_Articles['img'][1],
                          'articles_id2' => $id,
                          'url2' => $tab_Articles['img'][2],
                          'articles_id3' => $id,
                          'url3' => $tab_Articles['img'][3],
                          'articles_id4' => $id,
                          'url4' => $tab_Articles['img'][4]
                        ));
    
      $categories = explode(", ", $tab_Articles['categorie']);
      foreach ($categories as $value)
      {
        $reqcat = $bdd->prepare('SELECT *
                                  FROM categories
                                  WHERE name = :name
                                  ');
        $reqcat->execute(array('name' => $value));
        $datacat = $reqcat->fetchAll();
        Controller::Get()->Action($action);
        Controller::Get()->Action($action);
        $req = $bdd->prepare('INSERT INTO art_cat(articles_id, categories_id) VALUES(:art, :cat)');
        $req->execute(array('art' => $id, 'cat' => $datacat[0]['id']));
      }
    }
    return $insert;
  }
}

 ?>
