<?php require_once "src/view/header.php";?>
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
            <h2 class="red-text text-lighten-2" >Cadastrar</h2>
            <form class="row" action="create" method="POST" enctype="multipart/form-data">
                <div class="input-field col s8 offset-s2">
                    <input id="nome" name="itemNome" type="text" class="validate"/>
                    <label for="nome" >Nome do Item</label>
                </div>
                <div class="input-field col s8 offset-s2">
                    <textarea id="descricao" name="description" class="materialize-textarea"></textarea>
                    <label for="descricao">Descrição</label>
                </div>
                <div class="col s8 offset-s2">
                    <div id="type-item"> 
                        <?php foreach($data as $type): ?>
                            <label>
                                <input name="type" type="radio" value="<?= $type -> getId()?>" checked />
                                <span><?= utf8_encode($type -> getName())?></span>
                            </label>
                        <?php endforeach; ?>  
                    </div>
                </div>
                <div class="input-field col s8 offset-s2">
                    <input id="preco" name="precoItem" type="number" class="validate" step="0.01" name="quantity" min="0.01" />
                    <label for="preco" >Preço</label>
                </div>
                <div class="file-field input-field col s8 offset-s2">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="image" accept="image/png, image/jpeg">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Fotos">
                    </div>
                </div>
                <button class="btn waves-effect waves-light col s8 offset-s2" type="submit" name="action">
                    Cadastrar
                </button>
            </form>
        </div>
    </div>
</section>