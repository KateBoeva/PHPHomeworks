<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 20.11.17
 * Time: 21:06
 */

include "Logger.php";

class BrowserLogger extends Logger {

    public $mode;

    public function __construct($mode) {
        $this -> mode = $mode;
    }

    function writeLines($lines) {
        $date = $this->changeTime();
        for ($i = 0; $i < count($lines); $i++) {
            if ($i != count($lines)-1)
                $line = substr($lines[$i], 0, strlen($lines[$i])-1);
            else
                $line = substr($lines[$i], 0, strlen($lines[$i]));
            if (preg_match('/[A-Z]/', $line)) {
                print_r("В строке \"" . $line . "\" содержатся заглавные буквы.\t" . $date . "<br>");
            } else {
                print_r("В строке \"" . $line . "\" НЕ содержатся заглавные буквы.\t" . $date . "<br>");
            }
        }
    }

    function changeTime() {
        date_default_timezone_set("Europe/Moscow");
        switch ($this->mode){
            case "1":
                return strftime("%H:%M:%S");
            case "2":
                return strftime("%d/%m/%y %H:%M:%S");
            case "3";
                return null;
        }
    }
}