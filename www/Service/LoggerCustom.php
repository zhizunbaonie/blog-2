<?php
/**
 * Description: The log class allows to write messages to the log file.
 * Created by Krinnerion.
 * Date: 01.08.2015.
 */

namespace App\Service;

class LoggerCustom {

    protected static $logFile;
    protected $time;

    public function __construct($logFileName = 'common_logs')
    {
        static::$logFile = __DIR__ . '/Logs/' . $logFileName . '.txt';
    }

    public function log($msg)
    {
        $this->time = date('Y-m-d H:i:s');
        try {
            $stream = fopen(static::$logFile, 'a+');

            if (is_array($msg))
            {
                fputs($stream, '[' . $this->time . "] : \n");
                foreach ($msg as $key => $item) {
                    fputs($stream, "\t" . $key . ':' . $item . "\n");
                }
            }
            elseif (is_object($msg))
            {
                fputs($stream, '[' . $this->time . '] : ' . serialize($msg) . "\n");
            }
            else {
                fputs($stream, '[' . $this->time . '] : ' . $msg . "\n");
            }
            fputs($stream, "\n");
        }
        finally {
            fclose($stream);
        }
    }

}
