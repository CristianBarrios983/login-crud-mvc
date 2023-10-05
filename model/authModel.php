<?php
    class AuthModel{
        private $PDO;
        public function __construct()
        {
            require_once("c://xampp/htdocs/login-crud/config/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }

        public function login($correo,$pass){
            $stament = $this->PDO->prepare("SELECT * FROM usuarios WHERE correo = :correo");
            $stament->bindParam(":correo",$correo);

            if($stament->execute()){
                $usuario = $stament->fetch(PDO::FETCH_ASSOC);

                if($usuario){
                    //Verificacion de la contraseña
                    if(password_verify($pass,$usuario["pass"])){
                        //Iniciando sesion y asignando el usuario
                        session_start();
                        $_SESSION["usuario"] = $correo;
                        $_SESSION["rol"] = $usuario["rol"];

                        return true;

                    }else{
                        //Contraseña incorrecta
                        return false;
                    }

                }else{
                    //No se encontraron resultados
                    return false;
                }

            }else{
                //Error en la consulta
                return false;
            }
        }

        public function logout(){
            session_start();

            //Limpia todas las sesiones
            $_SESSION = array();

            //Destruye las sesiones
            session_destroy();

            return true;
        }
    }
?>