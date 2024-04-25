<?php

    class Db {
        public $user = "root";
        public $password = "root";
        public $host = "localhost";
        public $dbname = "banckStatistic";

        public function connect(){
            //$data = $this->get_data();
           
            try {
                return $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user, $this->password);
            } catch (PDOException $e){
                echo "Errore connession DB" . $e->getMessage();
            }
        }

        public function get_data(){
            $json2string =  file_get_contents(PATH . "/env.json");;
            $dati = json_decode($json2string, false);
            $this->user = $dati[0]->user;
            $this->password = $dati[0]->password;
            $this->host = $dati[0]->host;
            $this->dbname = $dati[0]->dbname;
            echo $dati[0]->host;
        }

        public static function querySelect($query)
        {
            $conn = new Db();
            $connection = $conn->connect();
            try{
                $statement = $connection->query($query,PDO::FETCH_ASSOC);
                
            } catch (PDOException $e){
                echo "La query non ha funzionato";
            }
            return $statement->fetchAll();
        }

        public static function querywriteDb ($query,$array)
        {
            $conn = new Db();
            $connection = $conn->connect();
            try {
                $statement = $connection->prepare($query);
                $statement->execute($array);
            } catch (PDOException $e){
                echo "Query non riuscita" . $e->getMessage();
            }
        }

        public function filterEmail($email){
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        public function filterString($string){
            return filter_var($string, FILTER_SANITIZE_STRING);
        }

        public function hackPassword($passwordPost){
            return password_hash($passwordPost, PASSWORD_DEFAULT);
        }

        public function passwordPlainText($passwordPost, $hash){
            if (password_verify($passwordPost, $hash)) {
                return 1;
            } else {
                return 0;
            }
        }

        public function getKeygen($n) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
        
            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
         
            return $randomString;
        }

        public function senderEmail($email,$subject,$keygen){
            $link = "http://angelobellanca.it/bankStatistic/view/auth/authKeyGen.php?keygen=$keygen";
            $txt = "Grazie per esserti registrato/a a BANCK STATISTIC. Da ora puoi cominciare ad usare il tuo software per controllare i costi e le spese. Collegati al seguente link per accedere $link";
            $html = "<html>
            <head>
            <title>Welcome</title>
            </head>
            <body>
            <p>$txt</p>
            </body>
            </html>";
            $headers = "From: eventorganization1@gmail.com";
            mail($email,$subject,$txt,$headers);
        }

        public function senderEmailPassword($email,$subject,$keygen){
            $link = "http://angelobellanca.it/bankStatistic/view/auth/ripristinaPassword.php?keygen=$keygen";
            $txt = ". Collegati al seguente link per ripristinare la password $link";
            $html = "<html>
            <head>
            <title>Ripristina password</title>
            </head>
            <body>
            <p>$txt</p>
            </body>
            </html>";
            $headers = "From: eventorganization1@gmail.com";
            mail($email,$subject,$txt,$headers);
        }

        public function casualString($length){
            $string = "";

            for ($i = 0; $i <= ($length/32); $i++)
                $string .= md5(time()+rand(0,99));
        
            $max_start_index = (32*$i)-$length;
            $random_string = substr($string, rand(0, $max_start_index), $length);
            return $random_string;
        }
    }

    $connection = new Db();

?>
