<?php
/**
 * Created by PhpStorm.
 * User: katemrrr
 * Date: 18.12.17
 * Time: 23:50
 */

use Psr\Log\Logger;

include "Logger.php";


$logger = new Logger();

$logger->execute(\Psr\Log\LogLevel::DEBUG, "debug_message");
$logger->execute(\Psr\Log\LogLevel::INFO, "info_me{s}sage");
$logger->execute(\Psr\Log\LogLevel::NOTICE, "no{ti}ce_msg");
$logger->execute(\Psr\Log\LogLevel::CRITICAL, "critica{l}_msg");

$logger->execute(Psr\Log\LogLevel::ERROR, "error_message");
$logger->execute(Psr\Log\LogLevel::WARNING, "warning_message");