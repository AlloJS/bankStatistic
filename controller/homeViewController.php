<?php
    $json2string =  file_get_contents(PATH . "/view/temp/menu.json");;
    $data = json_decode($json2string, false);
?>