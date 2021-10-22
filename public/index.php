<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Change</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="http://<?=$_SERVER['SERVER_NAME']?>/public/assets/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="http://<?=$_SERVER['SERVER_NAME']?>/public/assets/css/custom.css"  media="screen,projection"/>
    </head>
    <body>
        <?php 
            ini_set('default_charset','UTF-8');
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://change.test/public/assets/js/materialize.min.js"></script>    
    <script src="http://change.test/public/assets/js/select.js" ></script>
    <script src="http://change.test/public/assets/js/custom.js" ></script>
</html>