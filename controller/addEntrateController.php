<?php 

    $tipologieEntrate = $connection->querySelect("
    SELECT * FROM tipologieEntrate");

    foreach($tipologieEntrate as $tipologia){
        $options .= "<option value='$tipologia[id]'>$tipologia[nome]</option>";
    }
    $strResult = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $titolo = $connection->filterString($_POST["titolo"]);
        $tipo = $connection->filterString($_POST["tipo"]);
        $importo = $connection->filterString($_POST["importo"]);
        $dataAccredito = $connection->filterString($_POST["dataAccredito"]);
        $descrizioneAccredito = $connection->filterString($_POST["descrizioneAccredito"]);
        $dataFormat = date("Y-m-d H:i:s", strtotime($dataAccredito));
        $importoFormat = strtr($importo, ',', '.');
        
        if(strlen($titolo) > 0 && strlen($tipo) > 0 && strlen($importo) > 0 && strlen($dataAccredito) > 0 && strlen($descrizioneAccredito) > 0){
            $identify = $connection->casualString(6);
            $data = [$titolo,$importoFormat,$dataFormat,$descrizioneAccredito,$idUserSession,$tipo,$identify];
            $query = "INSERT INTO entrate (titolo,importo,oraAccredito,descrizione,id_user,id_tipologia,identify) VALUES (?,?,?,?,?,?,?)";
            $connection->querywriteDb($query,$data);

            $dataRiepilogo = [$titolo,$importoFormat,$dataFormat,$descrizioneAccredito,$idUserSession,'entrata',$identify];
            $queryRiepilogo = "INSERT INTO riepilogo (titolo,importo,orario,descrizione,id_user,movimento,identify) VALUES (?,?,?,?,?,?,?)";
            $connection->querywriteDb($queryRiepilogo,$dataRiepilogo);
            
            $strResult = "Entrata aggiunta con successo!";
            $strResultColor = "text-success";
        } else {
            $strResult = "Ops qualcosa è andato storto!";
            $strResultColor = "text-danger";
        }
        
    }


?>