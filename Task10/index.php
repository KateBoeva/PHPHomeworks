<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 27.11.17
 * Time: 18:37
 */

include "form.html";
include "Month.php";

if (isset($_POST["day"]) && isset($_POST["year"])) {
    $day = $_POST["day"];
    $month = $_POST["select"];
    $year = $_POST["year"];

    if ($day != null && $year != null) {

        date_default_timezone_set("Europe/Moscow");
        $date = new DateTime($year . '-' . $month . '-' . $day);
        $m = new Month($month, $year);

        print $date->format("d.m.Y") . " - это " . getNameOfWeek($m->getNumberOfWeek($date));
        print_r(printMonth($m, $month, $year));

    }
}

function printMonth(Month $mon, $month, $year) {

    $week = $mon->getNumberOfWeek(new DateTime("01-" . $month . "-" . $year));
    $space = "<table><tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td>сб</td><td>вс</td></tr><tr>" . getSpace($week);

    foreach ($mon as $item) {
        if ($item->format("d") == "01") {
            $space .= "</tr><tr>" . getSpace($week);
        }
        if ($week == 7) {
            $space .= "<td>" . $item->format("d") . "</td></tr><tr>";
            $week = 1;
        } else {
            $space .= "<td>" . $item->format("d") . "&nbsp" . "</td>";
            $week++;
        }
    }
    return $space . "</tr></table>" . getSpace($week);
}

function getSpace($week) {
    $s = "";
    if ($week > 1) {
        for ($i = 1; $i < $week; $i++) {
            $s .= "<td></td>";
        }
    }
    return $s;
}

function getNameOfWeek($week) {
    switch ($week) {
        case 1: return "понедельник";
        case 2: return "вторник";
        case 3: return "среда";
        case 4: return "четверг";
        case 5: return "пятница";
        case 6: return "суббота";
        case 7: return "воскресенье";
    }
}

