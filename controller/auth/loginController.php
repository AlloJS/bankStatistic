<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $userNamePost = $connection->filterEmail($_POST["email"]);
        $passwordPost = $connection->filterString($_POST["password"]);
        if($userNamePost != "" && $passwordPost != ""){
            
            $stringError = "";
            $users = $connection->querySelect("
                SELECT * FROM users 
                WHERE userName = '$userNamePost'
            ");
            if(count($users) <= 0){
                $stringError = "Username o password non corretti. Perfavore riprova. :-(";
            } else {
                $passwordCorrect = $connection->passwordPlainText($passwordPost, $users[0]["password"]);

                if(count($users) > 0 && $passwordCorrect == 1){
                    if(strlen($users[0]["keygen"]) == 0){
                        $_SESSION["userName"] = $userNamePost;
                        $_SESSION["id"] = $users[0]["id"];
                        header("Location: " . PATH . "/view/home.php");
                    } else {
                        $stringError = "Non hai confermato la e-mail.";
                    }
                } else {
                    $stringError = "La password è errata.";
                }
            }
        } else {
            $stringError = "Username o password non corretti. Perfavore riprova. :-(";
        }
         
        
    }


?>
