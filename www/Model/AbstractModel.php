<?php
/**
 * Description: Abstract Model Class.
 * Created by Krinnerion.
 * Date: 01.08.2015.
 */

namespace App\Model;
use App\Service\Database;
//use App\Service\LoggerCustom;


/**
 * @property string id
 */
abstract class AbstractModel {

    protected $data = [];
    protected static $table = 'foo';
    protected static $class = 'stdClass';
    protected static $config = [];

    //
    // Magic methods.
    //
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public function __get($key)
    {
        return $this->data[$key];
    }

    /**
     * @param array $data
     * @return bool
     */
    public function fill($data)
    {
        foreach($data as $key => $value) {
            if ($value == null)
                return false;
            $this->data[$key] = $value;
        }
        return true;
    }

    /**
     * @return array (of objects) | null
     */
    public static function getAll()
    {
        $db = static::prepareDatabase();
        $sql = "SELECT * FROM " . static::$table . " ORDER BY id DESC";
        return $db->makeSqlQuery($sql);
    }

    /**
     * @param $id
     * @return object | null
     */
    public static function getOneById($id)
    {
        $db = static::prepareDatabase();
        $sql = "SELECT * FROM " . static::$table . " WHERE id=:id";
        return $db->makeSqlQuery($sql, [':id' => $id])[0];
    }


    /**
     * @param array $columns
     * @param string $where
     * @return array|null
     */
    public static function getColumn(array $columns, $where = '1')
    {
        $names = implode(', ', $columns);
        $db = static::prepareDatabase();
        $sql = "SELECT " . $names . " FROM " . static::$table
                . " WHERE " . $where . " ORDER BY id DESC";

        return $db->makeSqlQuery($sql);
    }

    /**
     * @param $column
     * @param $value
     * @return array (of objects)
     */
    public static function getByColumn($column, $value)
    {
        $db = static::prepareDatabase();
        $sql ="SELECT * FROM " .static::$table . " WHERE " . $column . "=:" . $column;
        return $db->makeSqlQuery($sql, [':' . $column => $value]);
    }

    /**
     * @param $column
     * @param $value
     * @return object | null
     */
    public static function getOneByColumn($column, $value)
    {
        return static::getByColumn($column, $value)[0];
    }


    /**
     * @return bool
     */
    public function delete()
    {
        $db = new Database();
        $sql = "DELETE FROM " . static::$table . " WHERE id=:id";
        return $db->executeSqlQuery($sql, [':id' => $this->data['id']]);
    }

    /**
     * insert() if no ID in the data array, update() if ID is set.
     */
    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        }
        else {
            $this->insert();
        }
    }


    // INSERT INTO foo (bar, baz) VALUES (':bar', ':baz');
    /**
     * @return bool
     */
    protected function insert()
    {
        $colsNames = array_keys($this->data);
        $queryData = [];    // [':foo' => 'Foo, ':bar' => 'Baz', ...]
        foreach ($colsNames as $col)
        {
            $queryData[':' . $col] = $this->data[$col];
        }

        $sql = "INSERT INTO " . static::$table . " (" . implode(', ', $colsNames) . ")"
                . " VALUES (" . implode(', ', array_keys($queryData)) . ")";
        $db = new Database();

        $isSuccess = $db->executeSqlQuery($sql, $queryData);
        if ($isSuccess) {
            $this->id = $db->lastInsertedId();
        }
        return $isSuccess;
    }

    // UPDATE foo SET bar=:bar, baz=:baz
    /**
     * @return bool
     */
    protected function update()
    {
        $params = [];       // [foo => :foo, bar => :bar, ...]
        $queryData = [];    // [':foo' => 'Foo, ':bar' => 'Baz', ...]
        foreach ($this->data as $key => $value)
        {
            $queryData[':' . $key] = $value;
            if ('id' == $key)
                continue;
            $params[] = $key . '=:' . $key;
        }

        $sql = "UPDATE " . static::$table . " SET " . implode(', ', $params)
                . " WHERE id=:id";
        $db = new Database();

        return $db->executeSqlQuery($sql, $queryData);
    }


    protected static function prepareDatabase()
    {
        $db = new Database();
        $class = get_called_class();
        $db->setClassName($class);
        return $db;
    }

    protected static function getTableName()
    {
        return static::$table;
    }

}