<?php
/**
 * Description:
 * Created by Krinnerion.
 * Date: 26.09.2015.
 */

namespace App\Controller;
use App\Service\View;

class About
    extends AbstractController {

    public function actionIndex()
    {
        $view = new View();
        $view->title = 'Blog | About';
        $view->displayPage('about');
    }
}