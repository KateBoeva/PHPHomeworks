<?php
/**
// * Created by PhpStorm.
// * User: katemrrr
// * Date: 12.09.17
// * Time: 18:25
// */

require "form.html";

//,>,[<+>-]<.

$tape = array();
$x = 0;

$countWords = 0;

$n = 0;

$code = $_GET['code'];
$params = $_GET['params'];
$p = 0;

$word = "";


for ($i = 0; $i < strlen($code); $i++){
    $n = $tape[$x];
//    echo "<br>";
//    echo " for    x = ";
//    echo $x;
//    echo " for    n = ";
//    echo $n;
//    echo "<br>";
    switch ($code[$i]) {
        case ">":
            $x++;
//            echo "> <br>";
            break;
        case "<":
            $x--;
//            echo "< <br>";
            break;
        case "+":
            $n = ($n+1)%256;
            $tape[$x] = $n;
//            echo "  + = ";
//            echo $tape[$x];
//            echo "  x = ";
//            echo $x;
//            echo "<br>";
            break;
        case "-":
            $n = ($n-1)%256;
            $tape[$x] = $n;
//            echo "  - = ";
//            echo $tape[$x];
//            echo "  x = ";
//            echo $x;
//            echo "<br>";
            break;
        case ",":
            $tape[$x] = ord($params[$p]);
            $p++;
            break;
        case "[":
            if ($tape[$x] == 0) {
                $b = 1;
                while ($b != 0) {
                    $i++;
                    if ($code[$i] == "]") {
                        $b--;
                    } elseif ($code[$i] == "[") {
                        $b++;
                    }
                }
            }
//            echo "[ <br>";
            break;
        case "]":
            if ($tape[$x] != 0){
                $b = 1;
                while ($b != 0){
                    $i--;
                    if ($code[$i] == '['){
                        $b--;
                    }
                    if ($code[$i] == ']'){
                        $b++;
                    }
                }
            }
//            echo "] <br>";
            break;
        case ".":
            $countWords++;
//            $word = chr((int) implode("", $tape));
            $word = chr($tape[$x]);
//            echo $countWords;
//            echo ": ";
            echo $word;
//            echo "=";
//            echo $tape[$x];
//            echo "  x = ";
//            echo $tape[$x];
//            echo "<br>";
            break;
        default: $x++;
    }
}
