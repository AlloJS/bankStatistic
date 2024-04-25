<?php 
    if(strlen($_SESSION["userName"]) <= 0){
        header("Location: " . PATH . "/index.php");
    } 
?>