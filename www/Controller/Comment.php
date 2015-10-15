<?php
/**
 * Description:
 * Created by Krinnerion.
 * Date: 28.09.2015.
 */

namespace App\Controller;

use App\Model\Comment as ModelComment;

class Comment
    extends AbstractController {

    public function actionDelete()
    {
        $id = $_GET['id'];
        $comment = new ModelComment();
        $comment->id = $id;

        $comment->delete();
        header('Location: /admin');
    }

}