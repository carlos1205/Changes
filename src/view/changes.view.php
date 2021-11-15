<?php 
    require_once "header.php";

    $itens = ItemService::getItens($_SESSION['user_id']);
?>
<section class="container">
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
                        <p >Usuário: <?= $row['name_user']?></p>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn" href="http://<?=$_SERVER['SERVER_NAME']?>/chat">Conversar</a>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
    </div>
</section>