<?php
/**
 * Description: Autoload.
 * Created by Krinnerion.
 * Date: 01.07.2015.
 * @param $className
 */

function myAutoload($className)
{
    // App\Model\Article
    $classNameParts = explode(DIRECTORY_SEPARATOR, $className);
    // App -> F:\PROGRAMS\OpenServer\domains\articles\www
    $classNameParts[0] = __DIR__;

    $path = implode(DIRECTORY_SEPARATOR, $classNameParts) . '.php';
    if (file_exists($path))
    {
        /** @noinspection PhpIncludeInspection */
        require_once $path;
    }

}

spl_autoload_register('myAutoload');