<?php

class user{

public $id;
public $nombre;
public $apellido;
public $correo;
public $usuario;
public $password;
public $profilePhoto;


public function __construct(){

}

public function initdata($id,$nombre,$apellido,$correo,$usuario,$password){
    
    $this->id=$id;
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->correo=$correo;
    $this->usuario=$usuario;
    $this->password=$password;
} 

}
    



?>