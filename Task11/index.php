<?php

session_start();

$string = "<form method='post'>";

if (isset($_POST['text'])) {
    $string .= "<label><input type='text' name='text' value='" . $_POST["text"] . "'></label><br>";
    $_SESSION['text'] = $_POST['text'];
} else {

    if (isset($_SESSION['text'])) {
        $string .= "<label><input type='text' name='text' value='" . $_SESSION['text'] . "'></label><br>";
    } else {
        $string .= "<label><input type='text' name='text'></label><br>";
    }

}

$string .= "<input type='submit' value='Translate'></form>";

print_r($string);

include "../untitled1/index.php";
