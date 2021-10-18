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
</section>