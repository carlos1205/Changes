<?php 
    require_once "header.php";
    $itens = ItemService::getInstance() -> getItensWithOwner($_SESSION['user_id']);
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
        <?php foreach($itens as $item): ?>
            <div class="card horizontal">
                <div class="card-image">
                    <img src="public/image/<?= $item -> getImage()?>">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h5><?= $item -> getName()?></h5>
                        <p><?= $item -> getDescription()?></p>
                        <p class="type">Tipo: <?= utf8_encode($item -> getType())?></p>
                        <p class="cyan-text price">R$ <?= str_replace('.', ',',$item -> getPrice());?></p>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn" href="item/<?= $item -> getId()?>/editar">Editar</a>
                        <a class="waves-effect waves-light red btn" href="item/<?= $item -> getId()?>/deletar">Apagar</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</section>