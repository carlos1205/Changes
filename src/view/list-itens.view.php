<?php 
    require_once "header.php";
    require_once "src/service/item.service.php";

    $itens = getItensWithOwner($_SESSION['user_id']);
?>
<section class="container">
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
                        <a class="waves-effect waves-light red btn modal-trigger" href="#modal1">Apagar</a>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
    </div>
</section>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Confirmar</h4>
        <p>Essa alteração é irreversível deseja continuar?</p>
    </div>
    <div class="modal-footer">
        <a href="" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a href="#" class="modal-close waves-effect waves-green btn-flat">Confirmar</a>
    </div>
</div>