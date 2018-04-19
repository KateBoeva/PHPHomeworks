<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 13.11.17
 * Time: 18:45
 */

include "form.html";

$password = $_GET['password'];

$sizePassword = "/^\\S{10,}$/";
$upperLetters = "/(?=.{2,}[A-Z])/";
$lowerLetters = "/(?=.{2,}[a-z])/";
$numbers = "/(?=.{2,}[0-9])/";
$symbols = "/(?=.{2,}[%$#_*])/";

print_r($password);
echo "<br><br>";
$message = "";

if (strlen($password) > 0) {
    if (preg_match($sizePassword, $password) == 0) {
        $message .= "Пароль должен содержать не менее 10 символов" . "<br><br>";
    }
    if (preg_match($lowerLetters, $password) == 0) {
        $message .= "В пароле содержится менее, чем 2 строчных буквы" . "<br><br>";
    }
    if (preg_match($upperLetters, $password) == 0) {
        $message .= "В пароле содержится менее, чем 2 прописных буквы" . "<br><br>";
    }
    if (preg_match($numbers, $password) == 0) {
        $message .= "В пароле содержится менее, чем 2 цифры" . "<br><br>";
    }
    if (preg_match($symbols, $password) == 0) {
        $message .= "В пароле содержится менее, чем 2 специальных символа" . "<br><br>";
    }
    if (preg_match("/[A-Z]{4,}/", $password) == 1) {
        $message .= "В пароле содержится более 3 латинских прописных букв подряд" . "<br><br>";
    }
    if (preg_match("/[a-z]{4,}/", $password) == 1) {
        $message .= "В пароле содержится более 3 латинских строчных букв подряд" . "<br><br>";
    }
    if (preg_match("/[0-9]{4,}/", $password) == 1) {
        $message .= "В пароле содержится более 3 цифр подряд" . "<br><br>";
    }
    if (preg_match("/[%$#_*]{4,}/", $password) == 1) {
        $message .= "В пароле содержится более 3 спец символов подряд" . "<br><br>";
    }
    if ($message == "") {
        $message .= "Ваш пароль валиден!";
    }
}


print_r($message);