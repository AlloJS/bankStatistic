<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $key = $connection->filterString($_GET["keygen"]);
        $passwordPost = $connection->filterString($_POST["password"]);
        $checkPasswordPost = $connection->filterString($_POST["checkPassword"]);
        if(strlen($passwordPost) < 8){
            $stringError = "La password deve essere almeno 8 caratteri";
        } else {
            if($passwordPost == $checkPasswordPost){
                $passwordPostHash = $connection->hackPassword($passwordPost);
                $data = [];
                $keyRegisterGen = $connection->getKeygen(50);
                $query = "UPDATE users SET keyforgot = '',password = '$passwordPostHash'  WHERE keyforgot = '$key'";
                $connection->querywriteDb($query,$data);
                header("Location: " . PATH . "/view/auth/login.php");
            } else {
                $stringError = "Le password non corrispondono";
            }
            
        }

    }
?>