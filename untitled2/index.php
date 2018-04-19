<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 26.09.17
 * Time: 18:52
 */

include "form.html";

$text = $_GET["text"];

$strings = array();
$temp = "";

for ($i = 0; $i < strlen($text); $i++){
    if ($text[$i] != "\n"){
        $temp .= $text[$i];
    } else {
        array_push($strings, $temp);
        $temp = "";
    }
}

array_push($strings, $temp);
$stringsSize = count($strings);

for ($i = 0; $i < $stringsSize; $i++){
    array_push($strings, mix($strings[$i]));
}

for ($i = 0; $i < count($strings); $i++){

    uksort($strings, secondWord($strings[$i]));

    for($j = $i + 1; $j < count($strings); $j++){
        if (strnatcasecmp(secondWord($strings[$i]), secondWord($strings[$j])) > 0) {
            $temp = $strings[$j];
            $strings[$j] = $strings[$i];
            $strings[$i] = $temp;
        }
    }
}

foreach ($strings as $s){
    echo $s;
    echo "<br>";
}

function mix($s) {
    $arr = explode(" ", $s);
    shuffle($arr);
    return implode(" ", $arr);
}

function secondWord($string) {
    $secWord = "";
    $i = strpos($string, " ") + 1;
    for ($j = $i; $j < strlen($string); $j++) {
        if ($string[$j] != " ") {
            $secWord .= $string[$j];
        } else {
            return $secWord;
        }
    }
}
