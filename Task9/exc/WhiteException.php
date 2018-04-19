<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 28.11.17
 * Time: 11:47
 */

namespace exc;

class WhiteException extends ColorException
{
    public $message = "WhiteException: it is not white";

    public function __construct()
    {
        parent::__construct($this->message);
    }
}