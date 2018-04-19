<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 16.12.17
 * Time: 22:22
 */
namespace Psr\Log;

include "LogWriter.php";

/**
 * Class Logger
 * @package Psr\Log
 */
class Logger
{

    /**
     * @var
     */
    public $logWriter;

    /**
     * Executing needed type log.
     *
     * @param $level
     * @param $message
     *
     * @return void
     */
    public function execute($level, $message)
    {
        (new LogWriter())->log($level, $message, $this->getContext());
    }

    /**
     * Getting context for updating messages of logs.
     *
     * @return array
     */
    public function getContext()
    {
        $context = [
            "a" => "@",
            "s" => "\$",
            "rt" => "RT",
            "l" => "1",
            "o" => "0",
            "ti" => "TI"
        ];
        return $context;
    }
}