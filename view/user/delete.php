<?php
    require_once("c://xampp/htdocs/login-crud/controller/userController.php");
    $obj = new UsuarioController();
    $obj->delete($_GET["id"]);
    //echo $_GET["id"];
?>