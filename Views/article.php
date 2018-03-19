<?php
    global $id;
    $data = Model::Get()->article($id);
    $data_img = Model::Get()->Images($id);
    $data_cat = Model::Get()->Categorie($id);
    // var_dump($data_img);
?>
<main>
    <table>
        <tr>
            <td>
                <div class="article-large">
                    <img src="<?= $data_img[0]['url'] ?>" alt="">
                </div>
            </td>
            <td>
                <div class="article-description">
                    <h1><?= $data[0]['titre']?></h1>
                    <p><?= $data[0]['description']?></p>
                    <p>
                        <b>Dimension</b>
                        <label for="">
                        <?php
                            $dimension = "largeur: ";
                            $dimension .= $data[0]['largeur'];
                            $dimension .= "cm x hauteur: ";
                            $dimension .= $data[0]['hauteur'];
                            $dimension .= "cm x profondeur: ";
                            $dimension .= $data[0]['profondeur'];
                            $dimension .= "cm";
                            echo $dimension;
                        ?>
                        </label>
                    </p>
                    <p>
                        <b>Status</b>
                        <label for=""><?= $data[0]['stock'] == "1"?"en stock":"vendu" ?></label>
                    </p>
                    <p>
                        <b>Catégorie</b>
                        <?php
                            for($i = 0; $i < sizeof($data_cat); $i++)
                            {
                                echo " " .$data_cat[$i]['name'];
                                if($i < sizeof($data_cat)-1)
                                echo ",";
                            }
                            ?>
                    </p>
                    <div>
                        <?php foreach($data_img as $value) : ?>
                        <div class="article-small">
                            <img src="<?= $value['url'] ?>" alt="">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </td> 
        </tr>        
    </table>    
</main>