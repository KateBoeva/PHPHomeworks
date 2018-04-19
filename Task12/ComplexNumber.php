<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 12.12.17
 * Time: 10:06
 */

class ComplexNumber
{

    public $real;
    public $imagine;

    public function __construct(float $real, float $imagine) {
        $this->real = $real;
        $this->imagine = $imagine;
    }

    public function add(ComplexNumber $num) {
        $this->real += $num->real;
        $this->imagine += $num->imagine;
    }

    public function sub(ComplexNumber $num) {
        $this->real -= $num->real;
        $this->imagine -= $num->imagine;
    }

    public function mult(ComplexNumber $num) {
        $this->real *= $num->real;
        $this->imagine *= $num->imagine;
    }

    public function div(ComplexNumber $num) {
        $this->real /= $num->real;
        $this->imagine /= $num->imagine;
    }

    public function __toString()
    {
        if ($this->imagine < 0){
            return "number=" . strval($this->real) . strval($this->imagine) . "i\n";
        }

        return "number=" . strval($this->real) . "+" . strval($this->imagine) . "i\n";
    }


}