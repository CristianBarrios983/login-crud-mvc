<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="bg-primary-subtle">
    

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form action="view/login/login.php" method="POST" class="border rounded-3 p-4 bg-white" style="width: 25rem;">

        <!-- Mensaje de alerta -->
        
          <?php
            session_start();
            if(isset($_SESSION["mensaje"])){
              echo '<div class="alert alert-danger" role="alert">';
              echo $_SESSION["mensaje"];
              echo '</div>';
              unset($_SESSION["mensaje"]);
            } 
          ?>

        <h2 class="mb-2">Login</h2>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" required>
            </div>
            <button type="submit" class="btn btn-primary">Loguearse</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>