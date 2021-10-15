<html lang="pt-br">
    <head>
        <title>Change</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?php echo basename(__DIR__);?>/assets/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?php echo basename(__DIR__);?>/assets/css/custom.css"  media="screen,projection"/>
    </head>
    <body>
        <?php 
            $rota = explode('/', substr($_SERVER['REQUEST_URI'], 1));
            $recurso = empty($rota[0]) ? 'home' : $rota[0];
        
            $controlador = "src/controllers/$recurso.controller.php";
        
            if (file_exists($controlador)) {
                require($controlador);
            } else {
                require("src/controllers/404.controller.php");
            }
        ?>
    </body>
    <script type="text/javascript" src="<?php echo basename(__DIR__);?>/assets/js/materialize.min.js"></script>
</html>