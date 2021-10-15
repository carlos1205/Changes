<section id="login" class="container pad-top">
    <div class="row">
        <div class="card col s6 offset-s3 center">
            <h1 class="blue-text text-darken-4" >Login</h1>
            <form class="row" action="login" method="POST">
                <div class="input-field col s6 offset-s3">
                    <input id="username" type="text" class="validate"/>
                    <label for="username" >Username</label>
                </div>
                <div class="input-field col s6 offset-s3">
                    <input id="password" type="password" class="validate"/>
                    <label for="password" >Password</label>
                </div>
                <button class="btn waves-effect waves-light col s6 offset-s3" type="submit" name="action">
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