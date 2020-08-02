<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Inicio</title>


    <link href="css.css" rel="stylesheet" type="text/css">
    <link href="css.css" rel="stylesheet" type="text/css">

</head>

<body>
    <header>


        </div>
        </div>
        </div>
        <div class="navbar navbar-dark bg-success shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="user/logaut.php" class="navbar-brand d-flex align-items-center">

                    <strong>Cerrar Session</strong>


                </a>
            </div>
        </div>
    </header>

    <?php

  require_once 'auth.php';
  require_once 'servicio.php';
  require_once 'clases.php';
  require_once 'Iserviciobase.php';
  require_once 'IFileHandler.php';
  require_once 'JsonFileHandler.php';   
  require_once 'servidordatabase.php';
  require_once 'database/Context.php';
    
  
    $islogged=false;
      if(isset($_SESSION['user']) && $_SESSION['user']!=null){
$usuario=json_decode($_SESSION['user']);
$islogged=true;

      }
        $service = new servidordatabase("database");
  $servicio=new Servicio();

  $listaestudi = $service->Getlista($usuario->usuario);


  ?>

    <main role="main">

        <section class="jumbotron text-center">

            <div class="container">
                <?php if($islogged): ?>
                <h1>Crear Nuevo Post</h1>

                <p><a href="añadir.php" class="btn btn-outline-dark my-2">Crear Post &nbsp;&nbsp;&nbsp; <i
                            class="fas fa-paper-plane"></i></a></p>
                <?php else: ?>

                <?php endif;?>

            </div>

        </section>

        <div class="album py-5 bg-light">
            <div class="container">


                <div class="row">


                    <?php if (empty($listaestudi)) : ?>
                    <h3>No tiene Ningun Post Creado</h3>

                    <?php else : ?>

                    <?php foreach ($listaestudi as $estudiante) : ?>

                    <div class="col-md-4 ">

                        <div class="card border-danger mb-4 letra" style="width: 18rem;">


                            <div class="card-body">
                                <strong>
                                    <h2>
                                        <p class="card-text"><?php echo $estudiante->titulo;?>
                                    </h2>
                                    </p>
                                </strong>

                                <p class="card-text"><?php echo $estudiante->descripcion;?>
                                </p>

                                <p class="card-text"><?php echo $estudiante->fecha;?>
                                </p>

                                <center>
                                    <?php if($islogged): ?>
                                    <a href="editar.php?id=<?php echo $estudiante->id; ?>" class="card-link">
                                        <span style="color: darkblue;"> &nbsp;&nbsp;<i class=" far
                                        fa-edit"></i> </span></a>

                                    <a href="elim.php?id=<?php echo $estudiante->id; ?>" class="card-link"
                                        onclick="return confirmar()">&nbsp;&nbsp;
                                        <span style="color: red;"> <i class="far fa-trash-alt"></i></span></a>
                                    <?php else: ?>

                                    <?php endif;?>


                                </center>



                            </div>
                        </div>
                    </div>




                    <?php endforeach; ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        </div>


    </main>

    <script type="text/javascript">
    function confirmar() {
        var respuesta = confirm("Seguro de que quieres Eliminar este Post?");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
    </script>


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