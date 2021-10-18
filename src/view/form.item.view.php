<?php 
    require_once "header.php";
?>
<section>
<div class="row">
        <div class="card col s6 offset-s3 center">
            <h1 class="blue-text text-darken-4" >Cadastrar Item</h1>
            <form class="row" action="#" method="POST">
                <div class="input-field col s8 offset-s2">
                    <input id="nome" name="itemNome" type="text" class="validate"/>
                    <label for="nome" >Nome do Item</label>
                </div>
                <div class="col s8 offset-s2">
                    <p>
                        <label>
                            <input name="type" type="radio" checked />
                            <span>Produto</span>
                        </label>
                        <label>
                            <input name="type" type="radio" />
                            <span>Serviço</span>
                        </label>
                    </p>
                </div>
                <div class="input-field col s8 offset-s2">
                    <select>
                        <option value="" disabled selected>Escolha a categoria</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
                <div class="input-field col s8 offset-s2">
                    <input id="nome" name="itemNome" type="text" class="validate"/>
                    <label for="nome" >Preço</label>
                </div>
                <button class="btn waves-effect waves-light col s8 offset-s2" type="submit" name="action">
                    Cadastrar
                </button>
            </form>
            <div class="row">
                <a href="<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '#' ; ?>" > Voltar</a>
            </div>
        </div>
    </div>
</section>