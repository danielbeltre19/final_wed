<?php

class userservice {
 
private $context;
    
    public function __construct($directory){
        
        $this->context = new Context($directory);
    }

   public function Login($user,$password){

 $stmt= $this->context->db->prepare("select * from user where usuario = ? and password = ?");

 $stmt->bind_param("ss",$user,$password);
 $result= $stmt->execute();
 $result= $stmt->get_result();

if($result->num_rows === 0){

   return null; 
}else{

    $row = $result->fetch_object();
    $user= new User();

    $user->id = $row->id;
    $user->usuario= $row->usuario;
    $user->password = $row->password;
    $user->nombre = $row->nombre;
    $user->apellido = $row->apellido;
    $user->correo = $row->correo;
     $user->profilePhoto= $row->profilePhoto;
    
    
    
    return $user;
}
 
}
}
?>