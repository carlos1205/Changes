<?php 
    if (session_status() === PHP_SESSION_NONE)
        session_start();
?>
<section class="container pad-top">
    <div class="row">
        <div class="card col s6 offset-s3 center">
            <h1 class="blue-text text-darken-4" >Cadastrar</h1>
            <form class="row" action="cadastrar" method="post">
                <div class="input-field col s8 offset-s2">
                    <input id="username" name="username" type="text" class="validate"/>
                    <label for="username" >Nome</label>
                </div>
                <div class="input-field col s8 offset-s2" autocomplete="off">
                    <input id="email" name="email" type="email" class="validate"/>
                    <label for="email" >Email</label>
                </div>
                <div class="input-field col s8 offset-s2" autocomplete="off">
                    <input id="confirmEmail" name="confirmEmail" type="email" class="validate"/>
                    <label for="confirmEmail" >Confirme Email</label>
                </div>
                <div class="input-field col s8 offset-s2">
                    <input id="password" name="password" type="password" class="validate"/>
                    <label for="password" >Password</label>
                </div>
                <div class="input-field col s8 offset-s2">
                    <input id="confirmPassword" name="confirmPassword" type="password" class="validate"/>
                    <label for="confirmPassword" >confirme a senha</label>
                </div>
                <button class="btn waves-effect waves-light col s8 offset-s2" type="submit" name="action">
                    Cadastrar
                </button>
            </form>
            <div class="row">
                <a href="login" > Voltar</a>
            </div>
        </div>
    </div>
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
    </div>
</section>