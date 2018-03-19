<?php
  global $keyword;
  $data = Model::Get()->Keyword($keyword);
?>

<main>
    <h1>STOCK</h1>
    <?php include(VIEW .'search.php'); ?>
    <?php foreach($data as $value) : ?>
        <div class="article-min">
            <a href="index.php?action=article&id=<?= $value['id'] ?>">
                <div>
                    <img src="<?= $value['url']; ?>" alt="">
                </div>
                <label for=""><?= $value['titre']?></label>
            </a>
        </div>
    <?php endforeach; ?>
    <h3>CATALOGUE</h3>
    <?php include(VIEW .'catalogue.php'); ?>
    <hr class="hr--home">
</main>
