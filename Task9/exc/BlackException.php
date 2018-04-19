<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 26.11.17
 * Time: 18:53
 */

namespace exc;

class BlackException extends ColorException {

    public $message = "BlackException: it is not black";

    public function __construct()
    {
        parent::__construct($this->message);
    }

}