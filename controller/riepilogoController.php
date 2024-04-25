<?php 
    $strResult = "";
    $tipologieUscite = $connection->querySelect("
    SELECT * FROM tipologieUscite");

    foreach($tipologieUscite as $tipologia){
        $options .= "<option value='$tipologia[id]'>$tipologia[nome]</option>";
    }

    $where = "";
    $orderBY = " ORDER BY riepilogo.orario DESC,riepilogo.importo DESC ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(isset($_POST["importoFiltro"])){
            $startImporto = $connection->filterString($_POST["startImporto"]);
            $andImporto = $connection->filterString($_POST["andImporto"]);
            $startImporto = floor($startImporto);
            $andImporto = ceil($andImporto);

            var_dump($startImporto);
            $where .= " AND importo BETWEEN $startImporto 
            AND $andImporto ";
            $orderBY = " ORDER BY riepilogo.importo ASC ";
        }

        if(isset($_POST["periodoFiltro"])){
            $periodo = $connection->filterString($_POST["periodo"]);
            $anno = $connection->filterString($_POST["anno"]);
            $meseFne = $periodo + 1;
            $annoFine = $anno;

            if($periodo == 12){
                $meseFne = 1;
                $annoFine = $annoFine + 1;
            }

            $startData = date("Y-m-d H:i:s", strtotime($anno . "-" . $periodo . "-" . 1));
            $endData = date("Y-m-d H:i:s", strtotime($annoFine . "-" . $meseFne . "-" . 1));
            $where .= " AND orario >= '$startData' 
            AND orario < '$endData' ";
        }

    }
    
    $detailsEntrate = $connection->querySelect("
    SELECT DISTINCT * FROM riepilogo  
    WHERE riepilogo.id_user = $idUserSession
    $where
    $orderBY");
    
    foreach($detailsEntrate as $detail){
        $dataFormat = date("d-m-Y", strtotime($detail["orario"]));
        $importoFormat = number_format($detail["importo"], 2);

        if($detail["movimento"] == "uscita"){
            $class = "bi bi-arrow-down text-danger";
        } else {
            $class = "bi bi-arrow-up text-success";
        }
        $row .= "<tr id='$detail[id]'>
                        <td>$detail[titolo]</th>
                        <td><b>$importoFormat €</b></td>
                        <td>$dataFormat</td>
                        <td><i class='$class'></i></td>
                        <td>$detail[movimento]</td>
                </tr>";
    }


?>