<?php
    require_once("c://xampp/htdocs/login-crud/view/head/head.php");
    require_once("c://xampp/htdocs/login-crud/controller/authController.php");
    $obj = new AuthController();
    if($obj->isLogged() === true){
        if($obj->verificarPermisos(1) === true){
?>

<div class="d-flex justify-content-center">
    <form action="store.php" method="POST" autocomplete="off" class="m-3 border p-3 rounded-2" style="width: 25rem;">
    <h3>Registrar usuario</h3>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
        <label for="dni" class="form-label">DNI</label>
        <input type="text" class="form-control" id="dni" name="dni" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
        <label for="fecha_nac" class="form-label">Fecha nacimiento</label>
        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
        <label for="rol" class="form-label">Rol</label>
        <select class="form-select" aria-label="Default select example" id="rol" name="rol" required>
            <option selected>Seleccione un rol</option>
            <option value="1">Admin</option>
            <option value="2">Usuario comun</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="pass" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="pass" name="pass" required>
    </div>


    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php" class="btn btn-danger">Cancelar</a>
</form>
</div>

<?php
        }else{
            echo '<div class="alert alert-danger" role="alert">';
            echo "No tienes permiso para acceder a esta pertaña";
            echo '</div>';
        }
    }else{
        header("Location: /login-crud/index.php");
    }
?>

<?php
    require_once("c://xampp/htdocs/login-crud/view/head/footer.php");
?>