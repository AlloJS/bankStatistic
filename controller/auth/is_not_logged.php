<?php 
    if(isset($_SESSION["userName"])){
        header("Location: " . PATH . "/view/home.php");
    } 
?>