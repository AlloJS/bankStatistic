<?php
    $oggi = date("Y-m-d");
    $anno = date("Y");
    $mese = date("m");
    
    $ultimoGiorno = date("d", strtotime(date("Y-m-t", strtotime($oggi)))); 
    $ultimoGiornoData = date("Y-m-d", strtotime(date("Y-m-t", strtotime($oggi)))); 
    $primoGIornoData = date("Y-m-d", strtotime($anno."-".$mese."-01") );  
    
    $totUscite = $connection->querySelect("
    SELECT SUM(importo) AS somma FROM uscite WHERE id_user = '$idUserSession' AND oraAddebito >= '$primoGIornoData' AND oraAddebito < '$ultimoGiornoData' ORDER BY oraAddebito");
    $JSONuscite = round((float)$totUscite[0]["somma"],2);
    
    $totEntrate = $connection->querySelect("
    SELECT SUM(importo) AS somma FROM entrate WHERE id_user = $idUserSession AND oraAccredito >= '$primoGIornoData' AND oraAccredito <= '$ultimoGiornoData' ORDER BY oraAccredito");
    $JSONentrate = round((float)$totEntrate[0]["somma"],2);

    $totaliMovimentiEntrateQuery = $connection->querySelect("
    SELECT COUNT(*) AS count FROM entrate WHERE id_user = $idUserSession AND oraAccredito >= '$primoGIornoData' AND oraAccredito <= '$ultimoGiornoData' ORDER BY oraAccredito");
    $totaliMovimentiEntrate = (int)$totaliMovimentiEntrateQuery[0]["count"];
    
    $totaliMovimentiUsciteQuery = $connection->querySelect("
    SELECT COUNT(*) AS count FROM uscite WHERE id_user = $idUserSession AND oraAddebito >= '$primoGIornoData' AND oraAddebito < '$ultimoGiornoData' ORDER BY oraAddebito");
    
    $totaliMovimentiUscite = (int)$totaliMovimentiUsciteQuery[0]["count"];
    
    $totaliMovimenti = $totaliMovimentiEntrate + $totaliMovimentiUscite;
    
    if($totaliMovimenti == 0){
        $totaliMovimenti = 1;
    }
    $mediaMovimenti = round(($JSONentrate - $JSONuscite) / ($totaliMovimenti),2);
    
    if(is_nan($mediaMovimenti)){
        $mediaMovimenti = 0;
    }

    $mediaUscite = round(($JSONuscite / $totaliMovimenti),2);
    if(is_nan($mediaUscite)){
        $mediaUscite = 0;
    }
    $mediaEntrate = round(($JSONentrate / $totaliMovimenti),2);
    if(is_nan($mediaEntrate)){
        $mediaEntrate = 0;
    }
    
?>