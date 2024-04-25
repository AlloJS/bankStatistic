<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $userNamePost = $connection->filterEmail($_POST["email"]);
        $passwordPost = $connection->filterString($_POST["password"]);
        $checkPasswordPost = $connection->filterString($_POST["checkPassword"]);

        $users = $connection->querySelect("SELECT userName FROM users WHERE userName = '$userNamePost'");
        
        if(count($users) <= 0){
            if($userNamePost != "" && $passwordPost != ""){

                if(strlen($passwordPost) < 8){
                    $stringError = "La password deve essere almeno 8 caratteri";
                } else {
                    if($passwordPost == $checkPasswordPost){
                        $passwordPostHash = $connection->hackPassword($passwordPost);
                        $keyRegisterGen = $connection->getKeygen(50);
                        $stringError = "";
                        $data = [$userNamePost,$passwordPostHash,$keyRegisterGen];
                        $query = "INSERT INTO users (userName,password,keygen) VALUES (?,?,?)";
                        $connection->querywriteDb($query,$data);
                        $connection->senderEmail($userNamePost,"Register to Bank Satatistic",$keyRegisterGen);
                        //$stringError = "http://localhost/view/auth/authKeyGen.php?keygen=$keyRegisterGen";
                        //Qui controllare che manda email
                        header("Location: " . PATH . "/view/welcome.php");
                    } else {
                        $stringError = "Le password non corrispondono";
                    }
                    
                }
                
            } else {
                $stringError = "Username o password non corretti. Perfavore riprova. :-(";
            }
        } else {
            $stringError = "Account esistente. Perfavore riprova. :-(";
        }

        
         
        
    }


?>