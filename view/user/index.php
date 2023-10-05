<?php
    require_once("c://xampp/htdocs/login-crud/view/head/head.php");
    require_once("c://xampp/htdocs/login-crud/controller/userController.php");
    require_once("c://xampp/htdocs/login-crud/controller/authController.php");
    $obj = new AuthController();
    if($obj->isLogged() === true){
        if($obj->verificarPermisos(1) === true){
            $obj = new UsuarioController();
            $rows = $obj->index();
?>

<div class="mb-3">
    <a href="/login-crud/view/user/create.php" class="btn btn-primary">Agregar nuevo usuario</a>
</div>


<div class="container">
    <div class="row">
    <?php if($rows):?>
            <?php foreach($rows as $row): ?>
                <div class="col-4">
                    <div class="card mb-4" style="width: 20rem;">
                        <div class="card-body">
                            <p class="card-paragraph"><?= $row[0] ?></p>
                            <h5 class="card-title"><?= $row[1]." ".$row[2] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= "DNI: ".$row[3] ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?= "Fecha de nacimiento: ".$row[4] ?></h6>
                            <div>
                                <a href="show.php?id=<?= $row[0] ?>" class="btn btn-primary">Ver</a>
                                <a href="edit.php?id=<?= $row[0] ?>" class="btn btn-warning">Editar</i></a>

                                <!-- Button trigger modal -->
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminar el registro?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Una vez eliminado no se podra recuperar el registro
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                                <a href="delete.php?id=<?= $row[0] ?>" class="btn btn-danger">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No hay registros actualmente</p>
        <?php endif; ?>
    </div>
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