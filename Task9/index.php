<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 28.11.17
 * Time: 12:30
 */

include "form.html";
include "Methods.php";

$e = new Methods();

try {
    $e->checkCanGo();
} catch (\exc\YellowException $ye) {
    echo $ye;
} catch (\exc\GreenException $ge) {
    echo $ge;
}
echo "<br><br>";
try {
    $e->checkColor();
} catch (\exc\YellowException $ye) {
    echo $ye;
} catch (\exc\ColorException $ce) {
    echo $ce;
}
echo "<br><br>";
try {
    $e->checkGreenBlack();
} catch (\exc\GreenException $ge) {
    echo $ge;
} catch (\exc\BlackException $be) {
    echo $be;
}
echo "<br><br>";
try {
    $e->checkInYan();
} catch (\exc\BlackException $be) {
    echo $be;
} catch (\exc\WhiteException $we) {
    echo $we;
}

