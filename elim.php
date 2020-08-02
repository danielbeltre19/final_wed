<?php 

require_once 'auth.php';
  require_once 'servicio.php';
  require_once 'clases.php';
  require_once 'Iserviciobase.php';
  require_once 'IFileHandler.php';
    require_once 'JsonFileHandler.php';
      require_once 'servidordatabase.php';
       require_once 'database/Context.php';
       
  
  $service = new servidordatabase("database");

$id=isset($_GET['id']);

if($id){

    $estudianteid=$_GET['id'];
    $service->eliminar($estudianteid);


    
}

header("location: index.php");
exist();

?>