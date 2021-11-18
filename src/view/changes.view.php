<?php 
    require_once "header.php";

    $itens =ItemService::getInstance() -> getItens($_SESSION['user_id']);
?>
<section class="container">
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
                        <?php echo print_r($item -> getType()); ?>
                        <p class="cyan-text price">R$ <?= str_replace('.', ',',$item -> getPrice());?></p>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn" href="http://<?=$_SERVER['SERVER_NAME']?>/chat">Conversar</a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</section>