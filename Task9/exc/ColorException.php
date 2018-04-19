<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 28.11.17
 * Time: 11:46
 */

namespace exc;
use Exception;

class ColorException extends Exception {

    public $message = "ColorException: this is not a color";

    public function __construct($message = null)
    {
        if (is_null($message)) {
            parent::__construct($this->message);
        } else {
            parent::__construct($message);
        }

    }
}