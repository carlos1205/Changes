<header>
    <nav>
        <div class="nav-wrapper container">
            <a href="http://<?=$_SERVER['SERVER_NAME']?>/home" class="brand-logo">CHANGE</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="http://<?=$_SERVER['SERVER_NAME']?>/item">Encontrar Item</a></li>
                <li><a href="http://<?=$_SERVER['SERVER_NAME']?>/item/create">Change Item</a></li>
                <li><a href="http://<?=$_SERVER['SERVER_NAME']?>/chat">Chat</a></li>
                <li>
                    <a class='dropdown-trigger  waves-effect waves-light btn-small' href='#' data-target='dropdown1'>Perfil</a>

                    <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="http://<?=$_SERVER['SERVER_NAME']?>/my-itens">Changes</a></li>
                        <li class="divider" tabindex="-1"></li>
                        <li><a href="http://<?=$_SERVER['SERVER_NAME']?>/logout">LOG OUT</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="material-icons">search</i></a></li>
            </ul>
        </div>
    </nav>
</header>