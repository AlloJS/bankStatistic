<?php 

    $tipologieUscite = $connection->querySelect("
    SELECT * FROM tipologieUscite");

    foreach($tipologieUscite as $tipologia){
        $options .= "<option value='$tipologia[id]'>$tipologia[nome]</option>";
    }
    $strResult = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $titolo = $connection->filterString($_POST["titolo"]);
        $tipo = $connection->filterString($_POST["tipo"]);
        $importo = $connection->filterString($_POST["importo"]);
        $dataAddebito = $connection->filterString($_POST["dataAddebito"]);
        $descrizioneAddebito = $connection->filterString($_POST["descrizioneAddebito"]);
        $dataFormat = date("Y-m-d H:i:s", strtotime($dataAddebito));
        $importoFormat = strtr($importo, ',', '.');
       
        if(strlen($titolo) > 0 && strlen($tipo) > 0 && strlen($importo) > 0 && strlen($dataAddebito) > 0 && strlen($descrizioneAddebito) > 0){
            $identify = $connection->casualString(6);
            $data = [$titolo,$importoFormat,$dataFormat,$descrizioneAddebito,$idUserSession,$tipo,$identify];
            $query = "INSERT INTO uscite (titolo,importo,oraAddebito,descrizione,id_user,id_tipologia,identify) VALUES (?,?,?,?,?,?,?)";
            $connection->querywriteDb($query,$data);

            $data = [$titolo,$importoFormat,$dataFormat,$descrizioneAddebito,$idUserSession,'uscita',$identify];
            $query = "INSERT INTO riepilogo (titolo,importo,orario,descrizione,id_user,movimento,identify) VALUES (?,?,?,?,?,?,?)";
            $connection->querywriteDb($query,$data);

            $strResult = "Uscita aggiunta con successo!";
            $strResultColor = "text-success";
        } else {
            $strResult = "Ops qualcosa è andato storto!";
            $strResultColor = "text-danger";
        }
        
    }


?>