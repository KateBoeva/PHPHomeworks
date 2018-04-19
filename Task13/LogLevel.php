<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 18.12.17
 * Time: 21:56
 */

namespace Psr\Log;


/**
 * Class LogLevel
 * @package Psr\Log
 */
class LogLevel
{
    const EMERGENCY = 'emergency';
    const ALERT     = 'alert';
    const CRITICAL  = 'critical';
    const ERROR     = 'error';
    const WARNING   = 'warning';
    const NOTICE    = 'notice';
    const INFO      = 'info';
    const DEBUG     = 'debug';
}