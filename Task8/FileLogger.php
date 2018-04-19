<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 20.11.17
 * Time: 21:06
 */

class FileLogger extends Logger {

    public $name, $file;

    public function __construct($name) {
        $this -> name = $name;
        $this ->file = fopen($name, "w+");
    }

    function writeLines($lines) {
        date_default_timezone_set("Europe/Moscow");
        $date = strftime("%d/%m/%y %H:%M:%S");
        for ($i = 0; $i < count($lines); $i++) {
            if ($i != count($lines)-1)
                $line = substr($lines[$i], 0, strlen($lines[$i])-1);
            else
                $line = substr($lines[$i], 0, strlen($lines[$i]));
            if (preg_match('/[A-Z]/', $lines[$i])) {
                fwrite($this -> file, "В строке \"" . $line . "\" содержатся заглавные буквы.\t\t" . $date . "\n");
            } else {
                fwrite($this -> file, "В строке \"" . $line . "\" НЕ содержатся заглавные буквы.\t\t" . $date . "\n");
            }
        }

    }

    function __destruct() {
        fclose($this -> file);
    }
}