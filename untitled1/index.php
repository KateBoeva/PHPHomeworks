<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 19.09.17
 * Time: 18:14
 */

include "form.html";

if (isset($_POST["text"])) {
    $word = $_POST["text"];

    foreach (translating($word) as $val) {
        echo $val;
    }
}

function translating($w) {
    $count = 0;
    for ($i = 0; $i < strlen($w); $i++){
        if ($w[$i] == "h"){
            $w[$i] = "4";
            $count++;
        } elseif ($w[$i] == "l") {
            $w[$i] = "1";
            $count++;
        } elseif ($w[$i] == "e") {
            $w[$i] = "3";
            $count++;
        } elseif ($w[$i] == "o") {
            $w[$i] = "0";
            $count++;
        }
        yield $w[$i];
    }
    if (strlen($w) != 0) {
        print_r("<br>" . $count);
    }

}