<?php

    class UsuarioModel{
        private $PDO;
        public function __construct()
        {
            require_once("c://xampp/htdocs/login-crud/config/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }

        public function insertar($nombre,$apellido,$dni,$fecha_nac,$correo,$rol,$pass,$fechaActual){
            $stament = $this->PDO->prepare("INSERT INTO personas VALUES (null,:nombre,:apellido,:dni,:fecha_nac)");

            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":apellido",$apellido);
            $stament->bindParam(":dni",$dni);
            $stament->bindParam(":fecha_nac",$fecha_nac);

            //Ejecuta la primera insercion
            $personaInsertada = $stament->execute();
        
            //Recupera el id
            $idPersona = $this->PDO->lastInsertId();

            if($personaInsertada){
                $stamentUsuario = $this->PDO->prepare("INSERT INTO usuarios VALUES (null, :correo, :pass, :rol, :fechaActual, :idPersona)");

                $stamentUsuario->bindParam(":correo",$correo);
                $stamentUsuario->bindParam(":rol",$rol);
                $stamentUsuario->bindParam(":pass",$pass);
                $stamentUsuario->bindParam(":fechaActual",$fechaActual);
                $stamentUsuario->bindParam(":idPersona", $idPersona);
            }


            return ($stamentUsuario->execute()) 
                ? $idPersona
                : false;
        }

        public function show($id){
            $stament = $this->PDO->prepare("SELECT id_persona, nombre, apellido, dni, fecha_nacimiento, correo FROM personas personas INNER JOIN usuarios u ON persona = :id WHERE id_persona = :id");

            $stament->bindParam(":id", $id);

            return($stament->execute()) 
                ? $stament->fetch()
                : false ;
        }


        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM personas");
            return ($stament->execute())
                ? $stament->fetchAll()
                : false;
        }


        public function update($id,$nombre,$apellido,$dni,$fecha_nac,$correo){
            $stament = $this->PDO->prepare("UPDATE personas SET nombre = :nombre, apellido = :apellido, dni = :dni, fecha_nacimiento = :fecha_nac WHERE id_persona = :id");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":apellido",$apellido);
            $stament->bindParam(":dni",$dni);
            $stament->bindParam(":fecha_nac",$fecha_nac);
            $stament->bindParam(":id",$id);

            //Ejecuta la consulta
            if($stament->execute()){
                $stamentUsuario = $this->PDO->prepare("UPDATE usuarios SET correo = :correo WHERE persona = :id");
                $stamentUsuario->bindParam(":correo",$correo);
                $stamentUsuario->bindParam(":id",$id);
            }

            return ($stamentUsuario->execute())
                ? $id
                : false;
        }


        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM usuarios WHERE persona = :id");
            $stament->bindParam(":id",$id);

            if($stament->execute()){
                $stamentPerson = $this->PDO->prepare("DELETE FROM personas WHERE id_persona = :id");
                $stamentPerson->bindParam(":id",$id); 
            }

            return ($stamentPerson->execute())
                ? true
                : false;
        }
    }

?>