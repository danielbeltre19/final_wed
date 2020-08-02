<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Registrarme</title>


    <link href="../css.css" rel="stylesheet" type="text/css">
    <link href="../css.css" rel="stylesheet" type="text/css">

</head>

<body>
    <header>


        </div>
        </div>
        </div>

    </header>


    <?php


require_once "../IFileHandler.php";
require_once "../JsonFileHandler.php";
require_once "../servicio.php";
require_once "../database/Context.php";
require_once "user.php";
require_once "userservice2.php";

require_once "../PhpMailer/Exception.php";
require_once "../PhpMailer/PHPMailer.php";
require_once "../PhpMailer/SMTP.php";
require_once "../database/EmailHandler/EmailHandler.php";

       
$message = "";

$emailHandler = new EmailHandler("../database/EmailHandler");
  $service = new userservice2("../database");
  
  if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['usuario']) && isset($_POST['password']) && isset($_FILES['profilePhoto'])) {

 $newestudiante = new user();

 $newestudiante->initdata(0,$_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['usuario'],$_POST['password']);

 
if($service->comprobar($_POST['usuario'])==true){

    $message="Nombre de usuario existente intente con otro";
}else{

    $service->add($newestudiante);
    
    $message="Nombre de usuario existente intente con otro";
    
       $body="Link de activacion:  http://localhost/final/user/login.php";
$emailHandler->sendemail($_POST['correo'],"inicio de sesion",$body);


  echo "<script>
                alert('Verifique su correo electronico para activar su cuenta');
                window.location= 'login.php'
    </script>";


}
  }

  ?>

    <main role="main">

        <div class="row"></div>
        <div class="col-md-3"></div>
        <div class="col-md-6 form">

            <div class="card">
                <div class="card-header">
                    Registrarse
                </div>
                <div class="card-body">
                    <?php if($message !=""): ?>
                    <div class="alert alert-danger" role="alert">
                        <?=$message;?>
                    </div>
                    <?php endif;?>
                    <form enctype="multipart/form-data" action=" registro.php" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control " id="nombre" name="nombre" placeholder="Nombre ">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="" name="apellido" placeholder="apellido">
                        </div>

                        <div class=" form-group">
                            <label for="poder">Correo</label>
                            <input type="text" class="form-control" id="" name="correo" placeholder="correo">
                        </div>

                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="" name="usuario" placeholder="usuario">
                        </div>

                        <div class="form-group">
                            <label for="apellido">Contraseña</label>
                            <input type="password" class="form-control" id="" name="password" placeholder="password">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="photo">Seleciona una Foto</label>
                            <input type="file" class="form-control" id="photo" name="profilePhoto">
                        </div>
                        <br>
                        <center>
                            <a href="login.php" class="btn btn-outline-secondary">Volver atras &nbsp;&nbsp;
                                <i class="fas fa-reply-all"></i></a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-outline-success">Registrar usuario&nbsp;&nbsp;
                                <i class="fas fa-check"></i></button>
                        </center>
                </div>
                <form>

                </form>
            </div>

        </div>
        </div>

        <div class="col-md-3"></div>
        </div>



    </main>


    <script src="https://kit.fontawesome.com/96e239109c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

</body>

</html>