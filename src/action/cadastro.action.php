<?php
    class CadastrarAction{
        protected $userName;
        protected $userEmail;
        protected $confirmEmail;
        protected $userPass;
        protected $confirmPassword;

        function __construct($name, $email, $cemail, $pass, $cpass){
            $this->userName = $name;
            $this->userEmail = $email;
            $this->confirmEmail = $cemail;
            $this->userPass = $pass;
            $this->confirmPassword = $cpass;
        }

        public function cadastrar(){
            if (session_status() === PHP_SESSION_NONE)
                session_start();

            if($this->validaCampos()){
                try{
                    CadastrarService::cadastrar($this -> userName, $this -> userEmail, $this -> userPass);
                }catch(Exception $ex){
                    $arr = array($ex -> getMessage());
                    $_SESSION['error_message'] = $arr;
                }
            }else{
                header('Location: cadastrar');
            }
        }

        function validaCampos(){
            $bool = true;
            $arr = array();
    
            if(!(strlen($this->userName) > 3)){
                $bool = false;
                array_push($arr, "O Nome do usuário  '{$this->userName}'  deve ter mais de 3 caracteres");
            }
    
            if(!(strlen($this->userEmail) > 3)){
                $bool = false;
                array_push($arr, 'O email do usuário deve ter mais de 3 caracteres');
            }
    
            if(!(strcmp($this->userEmail, $this->confirmEmail) == 0)){
                $bool = false;
                array_push($arr, "Os campos de email não conferem");
            }
    
            if(!(strlen($this->userPass) > 3)){
                $bool = false;
                array_push($arr, 'A senha deve ter pelo menos 3 caracteres');
            }
            
            if(!(strcmp($this->userPass, $this->confirmPassword) == 0)){
                $bool = false;
                array_push($arr, 'Os campos de email não conferem');
            }
    
            $_SESSION['error_message'] = $arr;
            return $bool;
        }
    }