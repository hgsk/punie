<?php
abstract class DataMapper
{
    protected $pdo;
    protected static $lastQuery;
    protected static $lastError;
    protected $table;

    public function __construct($pdo){
       $this->pdo = $pdo;
    }

    public function get_class_name(){
        return __CLASS__;
    }

    public function getTable(){

    }

    public function getPrimaryKey($row){

    }

    public function getPrimaryKeyField(){

    }

    public function fieldExists($field){
    }

    public function validate(){

    }

    public function hasErrors(){}

    //Record Fetch
    public function all(){

    }

    public function find($id){

    }

    public function first($conditions = []){

    }

    public function query($sql, $model){

    }

    public function save($model){

    }

    public function insert($model){

    }

    public function update($model){

    }

    public function delete($model){

    }

    public static function get($model)
    {
    }

    protected static function prepareExecute($query,$params)
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
    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }
    protected function prepare($params){
        // TODO write test
        $statement = $this->pdo->prepare($params["sql"]);
        if($params["params"]){
            foreach($params["params"] as $key=> $value){
                $statement->bindParam($key,$value);
            }
        }
    }
    protected function execute($statement){
        $statement->execute();
        return $statement->fetch();
    }
}