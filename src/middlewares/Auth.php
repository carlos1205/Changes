<?php
    use Pecee\Http\Request;
    use \Pecee\Http\Middleware\IMiddleware as IMiddleware;

    class Auth implements IMiddleware{
        public function handle(Request $request){
            if (session_status() === PHP_SESSION_NONE)
                session_start();            

            if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "true"))
                header('Location: login');
        }
    }