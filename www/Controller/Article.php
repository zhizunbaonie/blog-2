<?php
/**
 * Description: Article controller.
 * Created by Krinnerion.
 * Date: 07.08.2015.
 */

namespace App\Controller;

use App\Service\View;
use App\Model\Article as ModelArticle;
use App\Model\Comment as ModelComment;


class Article
    extends AbstractController {


    public function actionIndex()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        if ($page < 1 || !is_numeric($page))
            $page = 1;
        $pagesAmount = ModelArticle::numberOfPages();

        $items = ModelArticle::getAllOnPage($page);
        $this->isFound($items);

        $view = new View(
            [
                'items' => $items,
                'title' => 'Blog | Main',
                'pages' => $pagesAmount,
                'page'  => $page
            ]);

        $view->displayPage('articles/index');
    }


    public function actionOne()
    {
        $id = $_GET['id'];

        // If a comment has been sent:
        if ($this->isPost())
        {
            $comm = new ModelComment();

            // fields cannot be empty!
            $success = $comm->fill(
                [
                    'article_id' => $id,
                    'author' => htmlspecialchars($_POST['author']),
                    'text' => htmlspecialchars($_POST['text']),
                ]);

            $success ? $comm->save() : $_SESSION['error'] = 'Fill all fields!';
            header('Location: /article/one?id=' . $id . '#comment');
            exit;
        }

        // Getting the particular article:
        $item = ModelArticle::getOneById($id);
        $this->isFound($item);

        $comments = ModelComment::getByColumn('article_id', $id);

        $view = new View(
            [
                'item' => $item,
                'comments' => $comments,
                'title' => $item->title,
            ]);

        $view->displayPage('articles/one');
    }


    public function actionAdd()
    {
        $article = new ModelArticle();

        $view = new View();
        $view->title = 'Blog | New';
        $view->article = $article;

        if ($this->isPost())
        {
            // fields cannot be empty!
            $success = $article->fill(
                [
                    'title' => htmlspecialchars($_POST['title']),
                    'content' => $_POST['content'],
                    'author_id' => 1,   // TODO users.
                ]);

            if ($success) {
                $article->save();
                header('Location: /article/index');
                exit;
            } else {
                $_SESSION['error'] = 'Fill all fields!';
                $view->article->content = $_POST['content'];
                $view->article->title = $_POST['title'];
            }
        }

        $view->displayPage('articles/add');
    }


    public function actionEdit()
    {
        $id = $_GET['id'];
        // Get updating data:
        $updating = ModelArticle::getOneById($id);
        $this->isFound($updating);

        $view = new View(
            [
                'article' => $updating,
                'title' => $updating->title,
            ]);

        if ($this->isPost())
        {
            $article = new ModelArticle();
            $article->id = $id;

            // fields cannot be empty!
            $success = $article->fill(
                [
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'author_id' => $updating->author_id,
                ]
            );

            if ($success) {
                $article->save();
                header('Location: /article/one?id=' . $id);
                exit;
            } else {
                $_SESSION['error'] = 'Fields cannot be empty!';
                $view->article->content = $_POST['content'];
                $view->article->title = $_POST['title'];
            }
        }

        $view->displayPage('articles/edit');
    }


    public function actionDelete()
    {
        $id = $_GET['id'];
        $article = new ModelArticle();
        $article->id = $id;

        $article->delete();
        header('Location: /article/all');
    }
}
