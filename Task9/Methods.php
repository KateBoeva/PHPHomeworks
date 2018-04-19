<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 28.11.17
 * Time: 11:50
 */

include "exc/ColorException.php";
include "exc/YellowException.php";
include "exc/GreenException.php";
include "exc/WhiteException.php";
include "exc/BlackException.php";

class Methods
{

    public $test;

    public function checkInYan() {
        $random = rand(0, 1);
        switch ($random) {
            case 0:
                throw new \exc\BlackException();
            case 1:
                throw new \exc\WhiteException();
        }
    }

    public function checkCanGo() {
        $random = rand(0, 1);
        switch ($random) {
            case 0:
                throw new \exc\YellowException();
            case 1:
                throw new \exc\GreenException();
        }
    }

    public function checkGreenBlack() {
        $random = rand(0, 1);
        switch ($random) {
            case 0:
                throw new \exc\GreenException();
            case 1:
                throw new \exc\BlackException();
        }
    }

    public function checkColor() {
        $random = rand(0, 1);
        switch ($random) {
            case 0:
                throw new \exc\ColorException();
            case 1:
                throw new \exc\YellowException();
        }
    }
}