<?php
    require_once('constant_sys.php');
    require_once(ROOT . "/model/session.php"); 
    header('Location: ' . PATH . '/view/auth/login.php');
    echo $_SERVER["DOCUMENT_ROOT"];
?>
