<?php 
    session_start();
?>
<section id="login" class="container pad-top">
    <div class="row">
        <div class="card col s6 offset-s3 center">
            <h1 class="blue-text text-darken-4" >Login</h1>
            <form class="row" action="login" method="POST">
                <div class="input-field col s8 offset-s2">
                    <input id="email" name="email" type="email" class="validate"/>
                    <label for="email" >Email</label>
                </div>
                <div class="input-field col s8 offset-s2">
                    <input id="password" name="password" type="password" class="validate"/>
                    <label for="password" >Password</label>
                </div>
                <button class="btn waves-effect waves-light col s8 offset-s2" type="submit" name="action">
                    Login
                </button>
            </form>
            <div class="row">
               <label>Ainda não tem uma conta?</label>
                <a href="../cadastrar" > Criar conta </a> 
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
</section>