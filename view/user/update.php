<?php
    require_once("c://xampp/htdocs/login-crud/controller/userController.php");
    $obj = new UsuarioController();
    $obj->update($_POST["id"],$_POST["nombre"],$_POST["apellido"],$_POST["dni"],$_POST["fecha_nac"],$_POST["correo"]);
?>