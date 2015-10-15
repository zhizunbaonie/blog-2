<?php
/**
 * Description: My custom exception class.
 * Created by Krinnerion.
 * Date: 01.08.2015.
 */

namespace App\Service;

class ExceptionCustom
    extends \Exception {

    private $logger;


    public function exceptionLogging(\Exception $e, $logFile = 'common_logs.txt')
    {
        $this->logger = new LoggerCustom($logFile);
        $this->logger->log($e->getMessage());
        $this->logger->log($e->getTraceAsString());
    }

    public function display($msg)
    {
        echo 'Sorry, looks like we have a trouble!'
            . '<br/>Message: ' . $msg;
    }
}