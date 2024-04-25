<?php
    require_once('../../constant_sys.php');
    require_once(ROOT . "/controller/auth/is_not_logged.php"); 
    require_once(ROOT . "/model/db.php"); 

$key = $connection->filterString($_GET["keygen"]);

$data = [];
$query = "UPDATE users SET keygen = '' WHERE keygen = '$key'";
$connection->querywriteDb($query,$data);
header("Location: " . PATH . "/view/auth/login.php");

?>