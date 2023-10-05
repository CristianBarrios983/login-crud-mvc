<?php 
    require_once("c://xampp/htdocs/login-crud/view/head/head.php");


    require_once("c://xampp/htdocs/login-crud/controller/authController.php");
    $obj = new AuthController();
    if($obj->isLogged() === true){
?>

<h1>Bienvenido <?php echo $_SESSION["usuario"]; ?></h1>

<?php
    }else{
        header("Location: ../index.php");
    }
?>

<?php 
    require_once("c://xampp/htdocs/login-crud/view/head/footer.php");
?>