<?php
class DAO
{
    private static $dao;
    protected static $db;
    protected static $table;
    protected static $lastQuery;
    protected static $lastError;

    public static function initialize($table)
    {
        self::setTable($table);
        self::setDB(DBManager::get());
    }

    public static function getDAO($dao)
    {
        $className = $dao;

        if(!isset(self::$dao[$className]))
        {
            self::$dao[$className]=new $className();
            return self::$dao[$className];
        }else{
            return null;
        }
        return self::$dao[$className];
    }

    private static function setTable($table){
        self::$table = $table;
    }

    private static function setDB($db){
        self::$db = $db;
    }

    public static function getLastQuery(){
        return self::lastQuery;
    }
    public static function getLastError()
    {
        return self::lastError;
    }
    public static function getDB(){
        return self::db;
    }
    public static function prepareExecute($query,$params)
    {
        if(self::db == null)return;
        self::setLastQuery($query);

        //TODO Guard from SQL Injection
        $db = self::getDB;
        $statement = $db->prepare($query);
        if(statement != null){
            self::setLastError($statement->errorInfo());
            $statement->execute($params);
            self::setLastError($statement->errorInfo());
        }
        return $statement;
    }

    private static function setLastError($error){
       self::$lastError = $error;
    }

    private static function setLastQuery($query){
        self::$lastQuery = $query;
    }
    public function getAll($where='',$order='')
    {
        //TODO string check
        if($this->dbh == null)return;
        $sql = 'SELECT * FROM '. $this->table . ' WHERE ' . $where . 'ORDER BY' . $order;
    }

}