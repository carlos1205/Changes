<?php 
    require_once "header.php";
    require_once "src/service/item.service.php";

    $itens = getItensWithOwner($_SESSION['user_id']);
?>
<section class="container">
<div class="row">
        <div class="col s6 offset-s3 center">
            <?php 
                if(isset($_SESSION['error_message'])):
                    $arr = $_SESSION['error_message'];
                    foreach($arr as $value):            
            ?>
                <p class="red-text"><?= $value?></p>
            <?php 
                    endforeach;
                    unset($_SESSION['error_message']);
                endif;
            ?>
        </div>
        <div class="col s6 offset-s3 center">
            <?php 
                if(isset($_SESSION['success_message'])):
                    $arr = $_SESSION['success_message'];
                    foreach($arr as $value):            
            ?>
                    <p class="green-text"><?= $value?></p>
            <?php 
                    endforeach;
                    unset($_SESSION['success_message']);
                endif;
            ?>
        </div>
    </div>
    <h2 class="red-text text-lighten-2">Seus Itens:</h2>
    <div id="itens" class="col s12 m7">
        <?php while($row = mysqli_fetch_array($itens)): ?>
            <div class="card horizontal">
                <div class="card-image">
                    <img src="public/image/<?= $row['image']?>">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h5><?= $row['name']?></h5>
                        <p><?= $row['description']?></p>
                        <p class="type">Tipo: <?= utf8_encode($row['name_type'])?></p>
                        <p class="cyan-text price">R$ <?= str_replace('.', ',', $row['price']);?></p>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn" href="item/<?= $row['id']?>">Editar</a>
                        <a class="waves-effect waves-light red btn" href="item-delete/<?= $row['id']?>">Apagar</a>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
    </div>
</section>