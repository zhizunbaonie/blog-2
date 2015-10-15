<?php
/**
 * Description: Work with a database.
 * Created by Krinnerion.
 * Date: 01.08.2015.
 */

namespace App\Service;

class Database {

    private $className = 'stdClass';
    private $handler;
    private $dbh;


    public function __construct()
    {
        $config = Application::getDatabaseConfig();
        $dsn = 'mysql:dbname=' . $config['db_name'] . ';host=' . $config['db_host'];

        try {
            $this->dbh = new \PDO($dsn, $config['db_username'], $config['db_password']);
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $e) {
            $this->processingError($e);
            throw new \PDOException($e->getMessage());
        }
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }


    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function makeSqlQuery($sql, $params = [])
    {
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll(\PDO::FETCH_CLASS, $this->className);
        }
        catch (\PDOException $e) {
            $this->processingError($e);
            throw new \PDOException($e->getMessage());
        }
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool
     */
    public function executeSqlQuery($sql, $params = [])
    {
        try {
            $stmt = $this->dbh->prepare($sql);
            return $stmt->execute($params);
        }
        catch (\PDOException $e) {
            $this->processingError($e);
            throw new \PDOException($e->getMessage());
        }

    }

    /**
     * @param $sql
     * @param array $params
     * @return string
     */
    public function makeSqlQueryOne($sql, $params = [])
    {
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchColumn();
        }
        catch (\PDOException $e) {
            $this->processingError($e);
            throw new \PDOException($e->getMessage());
        }
    }


    public function lastInsertedId()
    {
        return $this->dbh->lastInsertId();
    }

    private function processingError(\Exception $e)
    {
        $config = Application::getLogsConfig();
        $this->handler = new ExceptionCustom();
        $this->handler->exceptionLogging($e, $config['db_logs']);
    }

}