<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 17.11.17
 * Time: 12:14
 */

include "form.html";

$site = addcslashes($_POST["site"], "\\");

$status = 0;
$output = array();

$ping = $_POST["ping"];
$tracert = $_POST["tracert"];

$ip = getIp($site);

if ($site != "") {
    if ($ping == "on") {
        exec("ping -c 4 $ip", $output, $status);
        if ($status == 64) {
            print_r("Неверный URL сайта!");
        } else {
            print_r("<b>{$ip}</b><br>" . findResult($output) . "% успешных запросов<br><br>");
        }

    }
    if ($tracert == "on"){
        $output = array();
        exec("traceroute $ip", $output, $status);
        if ($status == 1) {
            print_r("Неверный URL сайта!");
        } else {
            printTrace($output);
        }
    }
}

function getIp($site) {
    $site_array = parse_url($site);
    $site = $site_array['host'];
    return gethostbyname($site);
}

function findResult($data) {
    $answer = "";
    for ($i = 0; $i < count($data); $i++) {
        $index = strpos($data[$i], "%");
        if ($index != false) {
            $str = substr($data[$i], 0, $index);
            $answer = substr($str, strripos($str, " "));
        }
    }
    return 100 - (integer) $answer;
}

function printTrace($data) {
    foreach ($data as $elem) {
        $pattern = "(([0-9]{1,3}[\.]){3}[0-9]{1,3})";
        preg_match($pattern, $elem, $word);
        print_r($word[0] . "<br>");
    }
}