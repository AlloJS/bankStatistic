<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $userNamePost = $connection->filterEmail($_POST["email"]);
        $data = [];
        $keyRegisterGen = $connection->getKeygen(50);
        $query = "UPDATE users SET keyforgot = '$keyRegisterGen' WHERE userName = '$userNamePost'";
        $connection->querywriteDb($query,$data);

        $stringError = "Controlla la tua email per ripristinare la password. http://localhost/view/auth/ripristinaPassword.php?keygen=$keyRegisterGen";
        $connection->senderEmailPassword($userNamePost,"Cambia password",$keyRegisterGen);
        //Qui controllare che manda email
        header("Location: " . PATH . "/view/welcome.php");
    }
?>