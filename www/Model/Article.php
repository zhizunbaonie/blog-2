<?php
/**
 * Description: Article model.
 * Created by Krinnerion.
 * Date: 01.08.2015.
 */

namespace App\Model;


/**
 * @property string content
 * @property string title
 */
class Article
    extends AbstractModel {

    protected static $table = 'articles';

    const ARTICLES_ON_PAGE = 5;
    const INTRO_WORDS = 30;


    /**
     * @param $page
     * @return array (of objects) | null
     */
    public static function getAllOnPage($page)
    {
        $shift = ($page - 1) * static::ARTICLES_ON_PAGE;

        $db = static::prepareDatabase();
        $sql = "SELECT * FROM " . static::$table .
            " ORDER BY id DESC LIMIT $shift, " . static::ARTICLES_ON_PAGE;

        $articles = $db->makeSqlQuery($sql);

        foreach ($articles as $key => $article) {
            $article->intro = static::generateIntro($article->content);
        }
        return $articles;
    }


    public static function numberOfPages()
    {
        $db = static::prepareDatabase();
        $sql = "SELECT count(*) AS num FROM " . static::$table;
        $amount = $db->makeSqlQueryOne($sql);

        return ceil($amount / static::ARTICLES_ON_PAGE);
    }

    protected static function generateIntro($content)
    {
        $content = strip_tags($content);
        $words = explode(' ', $content);
        if (count($words) < static::INTRO_WORDS)
            return $content;
        $intro = implode(' ', array_slice($words, 0, static::INTRO_WORDS));
        return $intro . ' ...';
    }

}