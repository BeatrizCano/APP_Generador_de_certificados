<?php 
//validar si hay un envío...
session_start();
//validar que password  y nombre sean igual a admin (se puede cambiar admin por otra palabra)
if($_POST) {
//si los datos introducidos son incorrectos
  $message = 'Usuario o contraseña incorrectos';

  if($_POST['user']=='admin' && $_POST['password']=='admin') {
    //si tiene usuario y contraseña correctos va a iniciar sesion redireccionando a sections/index.php
    $_SESSION['user']=$_POST['user'];
    header('Location: sections/index.php');
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Prueba base de datos relacionales php</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!--bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
         
            </div>
            <div class="col-md-4">
                <br>
              
                <form action="" method="post">
                  <br/>
                <div class="card bg-light">
                    <div class="card-header bg-primary text-light">
                        Inicio de sesión
                    </div>
                    <div class="card-body">

                      <!--si el mensaje tiene algo (contraseña o nombre incorrectos), mostrar el mensaje en forma de alerta-->
                      <?php if(isset($message)) {?>

                        <div class="alert alert-danger" role="alert">
                          <strong><?php echo $message;?></strong> 
                        </div>       
                                     
                      <?php }?>

                        <div class="mb-3">
                          <label for="" class="form-label">Usuario</label>
                          <input type="text"
                            class="form-control" 
                            name="user" 
                            id="user" 
                            aria-describedby="helpId" placeholder="Escriba su usuario">

                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Contraseña</label>
                          <input type="password"
                            class="form-control" 
                            name="password" 
                            id="password" 
                            aria-describedby="helpId" placeholder="Escriba su contraseña">
                          
                        </div>
                          <button type="submit" class="btn btn-primary text-light"><i class="bi bi-skip-start-circle-fill"></i>&nbsp Iniciar</button> 
                                                
                    </div>
                    <div class="card-footer text-muted bg-ligth"></div>
                    </form>

                </div>                
            </div>
        </div>
    </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>