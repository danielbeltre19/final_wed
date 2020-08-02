<?php

class userservice2 {
 
    private $servicio;
private $context;
    
    public function __construct($directory){
        
        $this->servicio = new servicio();
        $this->context = new Context($directory);
    }

    public function add($entidad){

 $stmt= $this->context->db->prepare("insert into user (nombre,apellido,correo,usuario,password) values(?,?,?,?,?)");

 $stmt->bind_param("sssss",$entidad->nombre,$entidad->apellido,$entidad->correo,$entidad->usuario,$entidad->password);
 $stmt->execute();
 $stmt->close();

  $estudianteid = $this->context->db->insert_id;

if(isset($_FILES['profilePhoto'])){
    
    $photofile=$_FILES['profilePhoto'];

    if($photofile['error']==4){
    
    $entidad->profilePhoto = "";
    
   }else{

$typeReplace = str_replace("image/", "", $_FILES['profilePhoto']['type']);
 $type= $photofile['type'];
 $size= $photofile['size'];
 $name= $estudianteid . '.' . $typeReplace;
 $tmpname= $photofile['tmp_name'];
 
 $success=$this->servicio->uploadImage('imagenes/estudiante/',$name,$tmpname,$type,$size);
 
 if($success){
     
  $stmt = $this->context->db->prepare("update user set profilePhoto= ? where id =? ");

     $stmt->bind_param("si",$name,$estudianteid);
     $stmt->execute();
     $stmt->close();
 }
}
 

}
}

public function comprobar($username){

$stmt=$this->context->db->prepare("select * from user where usuario=?");
$stmt->bind_param("s",$username);
$stmt->execute();
$result=$stmt->get_result();

if($result->num_rows > 0){

return true;

}else{

return false;
}
$stmt->close();
}



}
?>