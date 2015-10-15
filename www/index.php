<?php
/**
 * Description: Front-Controller.
 * Created by Krinnerion.
 * Date: 01.08.2015.
 */

session_start();
require_once __DIR__ . '/autoload.php';

$config = require_once __DIR__ . '/Service/config.php';
App\Service\Application::setConfig($config);

    //
    // Processing data from the address bar.
    //
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $pathParts = explode('/', $path);

    $control = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'Article';
    $action = !empty($pathParts[2]) ? ucfirst($pathParts[2]) : 'Index';

    $method = 'action' . $action;   // e.g. actionAll();
    // Specifies the full name of the class:
    $controllerClassName = 'App\\Controller\\' . $control;

    //
    // Processing a request.
    //
    try
    {
        if (class_exists($controllerClassName))
            $controller = new $controllerClassName();
        else
            throw new \App\Service\ExceptionCustom('Incorrect request!');
        $controller->$method();
    }
    catch (Exception $e)
    {
        $view = new \App\Service\View();
        $view->error = $e->getMessage();
        $view->displayPage('error');
    }
