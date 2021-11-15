<?php
    class CadastrarService{
        public static function cadastrar($name, $email, $password) {
            if(CadastrarService::userExists($email)) throw new Exception("User já existe");
    
            $pass = md5($password);
            $query = "INSERT INTO change_user(name, email, pass) VALUES ('${name}', '${email}', '${pass}')";
            $res = Connection::insert($query);
    
            if(isset($res)){
                $_SESSION['success_message'] = array("Usuário Cadastrado");
                header('Location: login');
            }
        }
    
        private static function userExists($email){
            $query = "SELECT id FROM change_user WHERE email = '$email'";
            $res = Connection::find($query);
            return ($res -> num_rows > 0);
        }
    }
