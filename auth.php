<?php

session_start();

if(isset($_SESSION['user'])){

if($_SESSION['user']== null){

    $_SESSION['messageAuth']="debes iniciar session";
    header("Location: user/login.php");
    exit();
} 
}else{
    $_SESSION['messageAuth']="debe iniciar session";
    header("Location: user/login.php");
    exit();

}
?>