<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 13.11.17
 * Time: 23:08
 */

include "file.html";

$dataIni = parse_ini_file("index.ini", INI_SCANNER_RAW);
$file = file("text.txt");

for ($i = 0; $i < count($file); $i++) {

    $startLine = substr($file[$i], 0, 3);

    if (isset($dataIni[1])) {
        $data = $dataIni[1];
    }

    if($startLine == $dataIni["first_rule"]["symbol"]){
        if ($dataIni["first_rule"]["upper"] == "true") {
            $file[$i] = strtoupper($file[$i]);
        } else {
            $file[$i] = strtolower($file[$i]);
        }
    } else if($startLine == $dataIni["second_rule"]["symbol"]){
        $coef = 1;
        if ($dataIni["second_rule"]["direction"] == "-") {
            $coef *= -1;
        }
        for ($j = 0; $j < strlen($file[$i]); $j++){
            if ($file[$i][$j] >= "0" && $file[$i][$j] <= "9") {
                $sum = intval($file[$i][$j]) + $coef;
                if ($sum == 10){
                    $sum = 0;
                } elseif ($sum == -1) {
                    $sum = 9;
                }
                $file[$i][$j] = $sum;
            }
        }
    } else if($startLine == $dataIni["third_rule"]["symbol"]){
        $file[$i] = str_replace($dataIni["third_rule"]["delete"], "", $file[$i]);
    }
    print_r($file[$i] . "<br><br>");
}
