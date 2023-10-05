<?php
    session_start();
    class AuthController{
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/login-crud/model/authModel.php");
            $this->model = new AuthModel();
        }


        public function login($correo,$pass){
            $datos = $this->model->login($correo,$pass);
            
            if($datos != false){
                header("Location: ../panel.php");
            }else{
                // session_start();
                $_SESSION["mensaje"] = "Usuario o contraseña incorrectas";
                header("Location: ../../index.php");
            }
        }

        public function logout(){
            $this->model->logout();

            // session_start();
            if(!isset($_SESSION["usuario"])){
                header("Location: ../../index.php");
            }
        }
        
        public function verificarPermisos($rolRequerido){
            // session_start();
            if($_SESSION["rol"] != $rolRequerido){
                return false;
            }else{
                return true;
            }
        }

        public function isLogged(){
            // session_start();
            if(isset($_SESSION["usuario"])){
                return true;
            }else{
                return false;
                // header("Location: /login-crud/index.php");
            }
        }
    }
?>