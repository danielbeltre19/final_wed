<?php

class servidordatabase implements Iserviciobase{
 
    private $servicio;
private $context;
    
    public function __construct($directory){
        
        $this->servicio = new Servicio();
        $this->context = new Context($directory);
    }
public function Getlista($usuario){

    $listaestudiante = array();

    $stmt = $this->context->db->prepare("select * from post where usuario = ?");
 $stmt->bind_param("s",$usuario);
              /*var_dump($user);
               exit();*/ 
    $stmt->execute();
    $result= $stmt->get_result();

    
    if($result->num_rows === 0){

        return $listaestudiante;

    }else{
        
        while($row = $result->fetch_object()){
            
          $estudiante = new estudiante();

            $estudiante->id= $row->id;
            $estudiante->titulo= $row->titulo;
             $estudiante->descripcion= $row->descripcion;
              $estudiante->fecha= $row->fecha;
              $estudiante->usuario= $row->usuario;

            array_push($listaestudiante,$estudiante);
            
        }
    }
    
$stmt->close();
return $listaestudiante;

}

public function GetByid($id){

    $estudiante = new estudiante();

    
    
 $stmt = $this->context->db->prepare("select * from post where id = ?");
 $stmt->bind_param("i",$id);
    
    $stmt->execute();

    $result= $stmt->get_result();

    if($result->num_rows ===0){
        
        return null;
    }else{
        
        while($row = $result->fetch_object()){

              $estudiante->id= $row->id;
            $estudiante->titulo= $row->titulo;
            $estudiante->descripcion= $row->descripcion;
                 $estudiante->fecha= $row->fecha;
         
        }
    }
$stmt->close();
return $estudiante; 
}

public function añadir($entidad)
{

     $stmt = $this->context->db->prepare("insert into post (titulo,descripcion,fecha,usuario) values(?,?,?,?)");

     $stmt->bind_param("ssss",$entidad->titulo,$entidad->descripcion,$entidad->fecha,$entidad->usuario);
     $stmt->execute();
     $stmt->close();

     $estudianteid = $this->context->db->insert_id;


}

public function editar($id,$entidad){
    
$elemento= $this->GetByid($id);
    
     $stmt = $this->context->db->prepare("update post set titulo = ?,descripcion =?,fecha =?,usuario =? where id =?");
     $stmt->bind_param("ssssi",$entidad->titulo,$entidad->descripcion,$entidad->fecha,$entidad->usuario,$id);
     $stmt->execute();
     $stmt->close();

    
}


    public function eliminar($id){
  $stmt = $this->context->db->prepare("delete from post where id =? ");

     $stmt->bind_param("i",$id);
     $stmt->execute();
     $stmt->close();


}

}




?>