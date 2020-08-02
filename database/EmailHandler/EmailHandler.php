<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailHandler{

public $mail;
private $fileHandler;

function __construct($directory){

$this->mail=new PHPMailer(true);
$this->fileHandler = new JsonFileHandler($directory,"configuration");
    
}
function sendemail($to,$subject,$body){

 try{   
     
$configuration = $this->fileHandler->ReadConfiguration();
    
$this->mail->SMTPDebug = 2;
$this->mail->isSMTP();
$this->mail->Host=$configuration->Host;
$this->mail->SMTPAuth=true;
$this->mail->Username=$configuration->Username;
$this->mail->Password=$configuration->Password; 
$this->mail->SMTPSecure="tls";
$this->mail->Port=$configuration->Port;
$this->mail->setFrom($configuration->Username,$configuration->From);
   

$this->mail->addAddress($to);

$this->mail->isHTML(true);
$this->mail->Subject=$subject;
$this->mail->Body=$body;

$this->mail->send();
 
}catch(Exception $e){
   
    echo "el mensaje no pudo ser enviada por el siguiente error {$this->mail->ErrorInfo}";
    exit();
}
}
}




?>