<?php 
    session_start();

    if(isset($_SESSION)){
        $userSession = $_SESSION["userName"];
        $idUserSession = $_SESSION["id"];
    }    
?>