<?php
     $data_last = Model::Get()->LastArticles();
?>

<main>
    <h2>DERNIERS OBJETS</h2>
    <?php foreach($data_last as $value) : ?>
        <div class="article-min">
            <a href="index.php?action=article&id=<?= $value['id'] ?>">
                <div>
                    <img src="<?= $value['url']; ?>" alt="">
                </div>
                <label for=""><?= $value['titre']?></label>
            </a>
        </div>
    <?php endforeach; ?>
</main>