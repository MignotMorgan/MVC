<?php
     $data_categories = Model::Get()->Catalogues();
?>

<main>
    <?php foreach($data_categories as $value) : ?>
        <span class="div--catalogue">
            <a href="index.php?action=categories&category=<?= $value['name'] ?>"><?= $value['name'] ." (". $value['count'].")"; ?></a>
            <hr>
        </span>
    <?php endforeach; ?>
</main>