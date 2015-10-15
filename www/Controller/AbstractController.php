<?php
/**
 * Description: Abstract Controller Class.
 * Created by Krinnerion.
 * Date: 07.08.2015.
 */

namespace App\Controller;
use App\Service\ExceptionCustom;

abstract class AbstractController {


    public function __call($name, $arguments)
    {
        throw new ExceptionCustom('You made an incorrect action!');
    }

    protected function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    protected function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }


    protected function isFound($item)
    {
        if (empty($item)) {
            header("HTTP/1.0 404 Not Found");
            throw new ExceptionCustom('Nothing found!');
        }
    }

    protected function beforeAction() { }
}