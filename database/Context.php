<?php


Class Context{


public $db;
private $fileHandler;

function __construct($directory){

$this->fileHandler= new JsonFileHandler($directory,"configuration");
$configuration = $this->fileHandler->ReadConfiguration();
$this->db= new mysqli($configuration->server,$configuration->user,$configuration->password,$configuration->database);
 

if($this->db->connect_error){

    exit('error');
}
}
}






?>