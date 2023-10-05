<?php

    class UsuarioController{
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/login-crud/model/userModel.php");
            $this->model = new UsuarioModel();
        }

        public function guardar($nombre,$apellido,$dni,$fecha_nac,$correo,$rol,$pass,$fechaActual){
            $id = $this->model->insertar($nombre,$apellido,$dni,$fecha_nac,$correo,$rol,$pass,$fechaActual);

            return ($id!=false) 
                ? header("Location: show.php?id=".$id)
                : header("Location: create.php");
        }


        public function show($id){
            return($this->model->show($id) != false) 
                ? $this->model->show($id)
                : header("Location: index.php");
        }


        public function index(){
            return ($this->model->index())
                ? $this->model->index()
                : false;
        }


        public function update($id,$nombre,$apellido,$dni,$fecha_nac,$correo){
            return ($this->model->update($id,$nombre,$apellido,$dni,$fecha_nac,$correo) != false)
                ? header("Location: show.php?id=".$id)
                : header("Location: index.php");
        }


        public function delete($id){
            return ($this->model->delete($id))
                ? header("Location: index.php")
                : header("Location: show.php?id=".$id);
        }
    }

?>