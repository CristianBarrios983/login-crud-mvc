<?php
    require_once("c://xampp/htdocs/login-crud/view/head/head.php");
    require_once("c://xampp/htdocs/login-crud/controller/userController.php");
    $obj = new UsuarioController();
    $user = $obj->show($_GET["id"]);
?>

<form action="update.php" method="POST" autocomplete="">
    <h2>Modificando registro</h2>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" id="id" name="id" value="<?= $user[0] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $user[1] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Apellido</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $user[2] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">DNI</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="dni" name="dni" value="<?= $user[3] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Fecha nacimiento</label>
        <div class="col-sm-10">
        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?= $user[4] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Correo</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="correo" name="correo" value="<?= $user[5] ?>">
        </div>
    </div>
    <div>
        <input type="submit" value="Actualizar" class="btn btn-success">
        <a href="show.php?id=<?= $user[0] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>

<?php
    require_once("c://xampp/htdocs/login-crud/view/head/footer.php");
?>