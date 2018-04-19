<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 24.10.17
 * Time: 19:04
 */

function generator($ws){

    $numberLines = array();

    for ($i = 0; $i < count($ws); $i++) {
        for ($j = 0; $j < $ws[$i]; $j++) {
            array_push($numberLines, $i);
        }
    }

    return $numberLines;
}

function testGenerator($data, $strings, $genData, $count) {

    $final = array();

    for ($i = 0; $i < count($strings); $i++) {
        $d = $data[$i];
        $f = array();
        $f["text"] = $strings[$i];
        $f["count"] = 0;
        $f["calc_prob"] = $d["probability"];
        $final[$i] = $f;
    }

    $countEveryLines = array();
    for ($i = 0; $i < $count; $i++) {
        if (!empty($genData))
            $index = mt_rand(0,  count($genData) - 1);
            $x = $genData[$index];
        $countEveryLines[$x]++;
    }

    for ($i = 0; $i < count($countEveryLines); $i++) {
        $f = $final[$i];
        $f["count"] = (integer) $countEveryLines[$i];
        $f["calc_prob"] = (integer) $countEveryLines[$i] / $count;
        $final[$i] = $f;
    }
    return $final;
}