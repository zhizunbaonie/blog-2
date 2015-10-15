<?php
/**
 * Description: Application class for configuration setting.
 * Created by Krinnerion.
 * Date: 06.08.2015.
 */

namespace App\Service;

class Application {

    private static $config = [];


    public static function getConfig()
    {
        return self::$config;
    }

    public static function getDatabaseConfig()
    {
        return self::$config['database'];
    }

    public static function getLogsConfig()
    {
        return self::$config['logs'];
    }

    public static function setConfig($config)
    {
        self::$config = $config;
    }
}