<?php
class DAO
{
    private static $dao;
    protected $db;
    protected $table;
    protected $lastQuery;
    protected $lastError;

    public function __construct($table)
    {
        $this->table=$table;
        $this->db = DBManager::get();
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

    public function getLastQuery(){
        return $this->lastQuery;
    }
    public function getLastError()
    {
        return $this->lastError;
    }
    public function getDB(){
        return $this->db;
    }
    public function prepareExecute($query,$params)
    {
        if($this->db == null)return;
        $this->lastQuery = $query;

        //TODO Guard from SQL Injection
        $statement = $this->db->prepare($query);
        if(statement != null){
            $this->lastError = $statement->errorInfo();
            $statement->execute($params);
            $this->lastError = $statement->errorInfo();
        }
        return $statement;
    }

    public function getAll($where='',$order='')
    {
        //TODO string check
        if($this->dbh == null)return;
        $sql = 'SELECT * FROM '. $this->table . ' WHERE ' . $where . 'ORDER BY' . $order;
    }

}