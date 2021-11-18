<header>
    <nav>
        <div class="nav-wrapper container">
            <a href="http://<?=$_SERVER['SERVER_NAME']?>/home" class="brand-logo">CHANGE</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="http://<?=$_SERVER['SERVER_NAME']?>/item">Encontrar Item</a></li>
                <li><a href="http://<?=$_SERVER['SERVER_NAME']?>/item/criar">Change Item</a></li>
                <li><a href="http://<?=$_SERVER['SERVER_NAME']?>/chat">Chat</a></li>
                <li>
                    <a class='dropdown-trigger  waves-effect waves-light btn-small' href='#' data-target='dropdown1'>Perfil</a>

                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="http://<?=$_SERVER['SERVER_NAME']?>/my-itens">Changes</a></li>
                        <li class="divider" tabindex="-1"></li>
                        <li><a href="http://<?=$_SERVER['SERVER_NAME']?>/logout">LOG OUT</a></li>
                    </ul>
                </li>

                <li>
                    <form action="http://<?=$_SERVER['SERVER_NAME']?>/search"method="post">
                        <div class="input-field">
                        <input id="search" type="search" name="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>