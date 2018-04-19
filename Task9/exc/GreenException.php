<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 28.11.17
 * Time: 11:46
 */

namespace exc;

class GreenException extends ColorException
{
    public $message = "GreenException: it is not green";

    public function __construct()
    {
        parent::__construct($this->message);
    }
}