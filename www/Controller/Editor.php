<?php
/**
 * Description:
 * Created by Krinnerion.
 * Date: 27.09.2015.
 */

namespace App\Controller;

use App\Service\View;
use App\Model\Article as ModelArticle;

class Editor
    extends Article {

    public function actionIndex()
    {
        $view = new View();
        $view->title = 'Blog | Editor';

        $where = "author_id=" . 1;
        $view->items = ModelArticle::getColumn(['id', 'title'], $where);
        $view->displayPage('articles/editor');
    }
}