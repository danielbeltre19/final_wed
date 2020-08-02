<?php

class estudiante{

public $id;
public $titulo;
public $descripcion;
public $fecha;
public $usuario;


public function __construct(){
}

public function iniciodatos($id,$titulo,$descripcion,$fecha,$usuario){
    
    $this->id=$id;
    $this->titulo=$titulo;
    $this->descripcion=$descripcion;
     $this->fecha=$fecha;
      $this->usuario=$usuario;
     
}


}



?>