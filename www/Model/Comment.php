<?php
/**
 * Description: Comment model.
 * Created by Krinnerion.
 * Date: 05.08.2015.
 */

namespace App\Model;


/**
 * @property  string author
 * @property  string text
 */
class Comment
    extends AbstractModel {

    protected static $table = 'comments';


    public static function getAll()
    {
        $db = static::prepareDatabase();
//        $sql = "SELECT * FROM " . static::$table . " ORDER BY id DESC";

        $artTbl = Article::getTableName();
        $sql = "SELECT com.*, art.title FROM" . " "
            . static::$table . " com LEFT JOIN " . $artTbl . " art"
            . " ON art.id=com.article_id"
            . " ORDER BY com.id DESC";

        return $db->makeSqlQuery($sql);
    }
}