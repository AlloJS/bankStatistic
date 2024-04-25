<?php 
    $strResult = "";
    $total = 0;
    $tipologieUscite = $connection->querySelect("
    SELECT * FROM tipologieUscite");

    foreach($tipologieUscite as $tipologia){
        $options .= "<option value='$tipologia[id]'>$tipologia[nome]</option>";
    }

    $where = "";
    $orderBY = " ORDER BY uscite.oraAddebito DESC,uscite.importo DESC ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(isset($_POST["importoFiltro"])){
            $startImporto = $connection->filterString($_POST["startImporto"]);
            $andImporto = $connection->filterString($_POST["andImporto"]);
            $startImporto = floor($startImporto);
            $andImporto = ceil($andImporto);

            var_dump($startImporto);
            $where .= " AND importo BETWEEN $startImporto 
            AND $andImporto ";
            $orderBY = " ORDER BY uscite.importo ASC ";
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
            $where .= " AND oraAddebito >= '$startData' 
            AND oraAddebito < '$endData'
              ";
        }

        if(isset($_POST["tipoFiltro"])){
            $tipo = $connection->filterString($_POST["tipo"]);
            $where .= " AND id_tipologia = $tipo ";

            $periodo = $connection->filterString($_POST["periodoTipo"]);
            $anno = $connection->filterString($_POST["annoTipo"]);
            $meseFne = $periodo + 1;
            $annoFine = $anno;

            if($periodo == 12){
                $meseFne = 1;
                $annoFine = $annoFine + 1;
            }

            $startData = date("Y-m-d H:i:s", strtotime($anno . "-" . $periodo . "-" . 1));
            $endData = date("Y-m-d H:i:s", strtotime($annoFine . "-" . $meseFne . "-" . 1));
            $where .= " AND oraAddebito >= '$startData' 
            AND oraAddebito < '$endData'
              ";
        }

        if(isset($_POST["deleteRow"])){
            $data = [];
            $query = "DELETE FROM uscite WHERE identify = '$_POST[deleteRow]'";
            $connection->querywriteDb($query,$data);
            $query = "DELETE FROM riepilogo WHERE identify = '$_POST[deleteRow]'";
            $connection->querywriteDb($query,$data);
        }
    }
    
    $detailsEntrate = $connection->querySelect("
    SELECT * FROM uscite
    INNER JOIN tipologieUscite ON uscite.id_tipologia = tipologieUscite.id
    WHERE uscite.id_user = $idUserSession
    $where
    $orderBY");
    
    $somma = $connection->querySelect("
    SELECT SUM(uscite.importo) AS somma FROM uscite
    WHERE uscite.id_user = $idUserSession
    $where");
    
    $total = round($somma[0]["somma"],2);
    
    foreach($detailsEntrate as $detail){
        $dataFormat = date("d-m-Y", strtotime($detail["oraAddebito"]));
        $importoFormat = number_format($detail["importo"], 2);

        if($detail["nome"] == "Assicurazione"){
            $detail["nome"] = "Assic.";
        }

        if($detail["nome"] == "Finanziamento"){
            $detail["nome"] = "Finanz.";
        }

        $row .= "<tr id='$detail[id]'>
                        <td>$detail[titolo]</th>
                        <td><b>$importoFormat €</b></td>
                        <td>$dataFormat</td>
                        <td>$detail[nome]</td>
                        <form method='POST' name='deleteRow'>
                            <input name='deleteRow' type='hidden' value='$detail[identify]'>
                            <button style='display:none;' id='$detail[identify]' type='hidden'></button>
                        </form>
                        <td><button onclick=assegnaId('$detail[identify]') class='btn btn-outline-danger'><i class='bi bi-trash3'></i></button></td>
                </tr>";
    }


?>