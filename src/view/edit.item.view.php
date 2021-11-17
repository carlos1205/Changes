<?php 
    require_once "header.php";

    $item = ItemService::getInstance() -> getItemWithId($_SESSION['id_item']);
    $types = TypeService::getTypes();
    unset($_SESSION['id_item']);
?>
<section>
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
    <div class="row">
        <div class="card col s6 offset-s3 center">
            <h2 class="red-text text-lighten-2" >Alterar Item</h2>
            <form class="row" action="http://<?=$_SERVER['SERVER_NAME']?>/item/<?= $item -> getId()?>/edit" method="POST" enctype="multipart/form-data">
                <div class="input-field col s8 offset-s2">
                    <input id="nome" name="itemNome" type="text" value="<?= $item -> getName()?>"/>
                </div>
                <div class="input-field col s8 offset-s2">
                    <textarea id="descricao" name="description" class="materialize-textarea"><?= $item -> getDescription()?></textarea>
                </div>
                <div class="col s8 offset-s2">
                    <div id="type-item">
                        <?php foreach($types as $type): ?>
                            <label>
                                <input name="type" type="radio" value="<?= $type -> getId()?>" <?php if($item -> getType() == $type -> getId()) echo "checked"; ?> />
                                <span><?= utf8_encode($type -> getName())?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="input-field col s8 offset-s2">
                    <input id="preco" name="precoItem" type="number" value="<?= $item -> getPrice()?>"step="0.01" name="quantity" min="0.01" />
                </div>
                <div class="file-field input-field col s8 offset-s2">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" value="http://<?=$_SERVER['SERVER_NAME']?>/public/image/<?= $item -> getImage()?>" name="image" accept="image/png, image/jpeg">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path" type="text" value="<?= $item -> getImage()?>" placeholder="Fotos">
                    </div>
                </div>
                <button class="btn waves-effect waves-light col s8 offset-s2" type="submit" name="action">
                    Alterar
                </button>
            </form>
        </div>
    </div>
</section>