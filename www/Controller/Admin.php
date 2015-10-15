<?php
/**
 * Description:
 * Created by Krinnerion.
 * Date: 28.09.2015.
 */

namespace App\Controller;

use App\Model\Comment;
use App\Model\User;
use App\Service\View;


class Admin
    extends AbstractController {

    public function actionIndex()
    {
        $view = new View();
        $view->title = 'Blog | Admin';

//        $comments = Comment::getAll();


        $view->comments = Comment::getAll();
        $view->users = User::getAll();

        $view->displayPage('admin/index');
    }
}