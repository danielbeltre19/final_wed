<?php

require_once "../IFileHandler.php";
require_once "../JsonFileHandler.php";
require_once "../database/Context.php";
require_once "user.php";
require_once "userservice.php";

$result = null;
$message = "";

session_start();

$messageAuth=isset($_SESSION['messageAuth']) ? $_SESSION['messageAuth'] :"";
$_SESSION['messageAuth']="";

$service = new userservice("../database");

if(isset($_POST['usuario']) && isset($_POST['password'])){

    $result = $service->Login($_POST['usuario'],$_POST['password']);

    if($result != null){
        
$_SESSION['user']= json_encode($result);

header("Location: ../index.php");
exit();
        
    }else{

        $message="usuario o Contraseña incorrecta";
    }
}

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <link href="login.css" rel="stylesheet">
</head>

<body class="text-center border">

    <?php if($messageAuth != ""):?>

    <div class="alert alert-warning">
        <?= $messageAuth ?>
    </div>
    <?php endif;?>

    <form action="login.php" method="POST" class=" form-signin ">
        <?php if($message !=""): ?>
        <div class="alert alert-danger" role="alert">
            <?=$message;?>
        </div>
        <?php endif;

?>
        <h1 class="h3 mb-3 font-weight-normal inicio">Iniciar Session</h1>
        <br>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="text" id="user" class="form-control" placeholder="Usario" required="" autofocus="" name="usuario">
        <br>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required=""
            name="password">
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar</button>
        <br>
        <br>

        <a href="registro.php" class="btn btn-outline-success">Registrarme</a>

    </form>



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