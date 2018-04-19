<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 28.11.17
 * Time: 11:48
 */

namespace exc;

class YellowException extends ColorException
{
    public $message = "YellowException: it is not yellow";

    public function __construct()
    {
        parent::__construct($this->message);
    }
}