<?php
    require_once("c://xampp/htdocs/login-crud/controller/userController.php");

    $fechaActual = date("Y-m-d");
    $passHash = password_hash($_POST["pass"], PASSWORD_DEFAULT);

    $obj = new UsuarioController();
    $obj->guardar($_POST["nombre"],$_POST["apellido"],$_POST["dni"],$_POST["fecha_nac"],$_POST["correo"],$_POST["rol"],$passHash,$fechaActual);
?>