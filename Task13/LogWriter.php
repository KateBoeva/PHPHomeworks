<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 16.12.17
 * Time: 21:49
 */

namespace Psr\Log;

use DateTime;
use InvalidArgumentException;

include "LogLevel.php";
include "LoggerInterface.php";


/**
 * Class LogWriter
 * @package Psr\Log
 */
class LogWriter implements \Psr\Log\LoggerInterface
{

    /**
     * @var array
     */
    private $messages;
    /**
     * @var Logger
     */
    private $logger;

    /**
     * LogWriter constructor.
     */
    public function __construct()
    {
        $this->messages = array();
        $this->logger = new Logger();
    }

    /**
     * System is unusable.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function emergency($message, array $context = array())
    {
        $this->saveLogMessage(LogLevel::EMERGENCY, $message, $context);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function alert($message, array $context = array())
    {
        $this->saveLogMessage(LogLevel::ALERT, $message, $context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function critical($message, array $context = array())
    {
        $this->saveLogMessage(LogLevel::CRITICAL, $message, $context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function error($message, array $context = array())
    {
        $this->saveLogMessage(LogLevel::ERROR, $message, $context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function warning($message, array $context = array())
    {
        $this->saveLogMessage(LogLevel::WARNING, $message, $context);
    }

    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function notice($message, array $context = array())
    {
        $this->saveLogMessage(LogLevel::NOTICE, $message, $context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function info($message, array $context = array())
    {
        $this->saveLogMessage(LogLevel::INFO, $message, $context);
    }

    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function debug($message, array $context = array())
    {
        $this->saveLogMessage(LogLevel::DEBUG, $message, $context);
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        switch ($level) {
            case LogLevel::EMERGENCY:
                $this->emergency($message, $context);
                break;
            case LogLevel::ALERT:
                $this->alert($message, $context);
                break;
            case LogLevel::CRITICAL:
                $this->critical($message, $context);
                break;
            case LogLevel::ERROR:
                $this->error($message, $context);
                break;
            case LogLevel::WARNING:
                $this->warning($message, $context);
                break;
            case LogLevel::NOTICE:
                $this->notice($message, $context);
                break;
            case LogLevel::INFO:
                $this->info($message, $context);
                break;
            case LogLevel::DEBUG:
                $this->debug($message, $context);
                break;
            default:
                throw new InvalidArgumentException();
                break;
        }
    }

    /**
     * This method update message considering context.
     *
     * @param string $type
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    private function saveLogMessage($type, $message, array $context)
    {
        $message = $this->generateMessage($message, $context);

        $arr = [
            'type' => $type,
            'date' => $this->getDate(),
            'content' => $message
        ];

        if (!isset($_SESSION['logs'])) {
            $_SESSION['logs'] = [$arr];
        } else {
            array_push($_SESSION['logs'], $arr);
        }

        file_put_contents('logs.json', '');
        $this->writeJsonFile($_SESSION['logs']);
    }


    /**
     * Method allow to get date creating log.
     *
     * @return String
     */
    private function getDate(): String
    {
        date_default_timezone_set("Europe/Moscow");
        return (new DateTime())->format('d-m-Y H:i');
    }

    /**
     * Generating messages considering context.
     *
     * @param $message
     * @param array $context
     *
     * @return String
     */
    private function generateMessage($message, array $context): String
    {
        foreach ($context as $key => $value) {
            if (stripos($message, $key) !== false) {
                $message = str_replace("{" . $key . "}", $value, $message);
            }
        }
        return $message;
    }

    /**
     * Writing information about logs to JSON file
     *
     * @param $messages
     *
     * @return void
     */
    private function writeJsonFile($messages)
    {
        $file = 'logs.json';
        $json = json_encode($messages, JSON_PRETTY_PRINT);
        $f = fopen($file, 'w');
        fwrite($f, $json);
        fclose($f);
    }
}