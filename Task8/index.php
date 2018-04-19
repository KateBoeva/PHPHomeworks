<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 20.11.17
 * Time: 21:32
 */

include "form.html";
include "BrowserLogger.php";
include "FileLogger.php";

$lines = explode("\n", $_POST["lines"]);
$radio = $_POST["radio"];
$logger = null;

if ($radio == "file") {
    $file = $_POST["file"];
    $logger = new FileLogger($file);
}
if ($radio == "browser") {
    $mode = $_POST["select"];
    $logger = new BrowserLogger($mode);
}

if ($logger != null) {
    $logger -> writeLines($lines);
}

