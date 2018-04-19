<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 16.10.17
 * Time: 9:33
 */

@include "form.html";
@include "generator.php";

$text = $_GET['text'];

$strings = array();
$ws = array();

$lines = array();
$data = array();

$temp = "";
$index = 0;

for ($i = 0; $i < strlen($text); $i++){
    if ($text[$i] != "\n"){
        $temp .= $text[$i];
    } else {
        $strings[$index] = $temp;
        $index++;
        $temp = "";
    }
}

$strings[$index] = $temp;

for ($i = 0; $i < count($strings); $i++) {
    $ind = strripos($strings[$i], " ");
    $ws[$i] = substr($strings[$i], $ind + 1);
    $strings[$i] = substr($strings[$i], 0, $ind);
}

$count = 0;
for ($i = 0; $i < count($ws); $i++) {
    $count += $ws[$i];
}

for ($i = 0; $i < count($strings); $i++) {
    $array = array();
    $array["text"] = $strings[$i];
    $array["weight"] = (integer) $ws[$i];
    if ($count != 0 && $ws[$i] != 0)
        $array["probability"] = $ws[$i]/$count;

    $data[$i] = $array;
}

$lines["sum"] = $count;
$lines["data"] = $data;

$json = json_encode($lines, JSON_PRETTY_PRINT);

if ($lines["sum"] != 0)
    print_r($json);
print_r("<br><br>");

$test = json_encode(
    testGenerator($data, $strings,
        generator($ws), 10000
    ), JSON_PRETTY_PRINT);

if ($lines["sum"] != 0)
    print_r($test);