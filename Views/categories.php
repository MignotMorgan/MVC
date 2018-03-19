<?php
  global $category;
  $data = Model::Get()->Categories($category);
  ?>

<main>
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
</main>