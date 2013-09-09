<?php
abstract class DataMapper
{
    protected $pdo;
    protected static $lastQuery;
    protected static $lastError;
    protected $table;

    public function __construct(PDO $pdo){
       $this->$pdo = $pdo;
    }

    public function _decorate($statement){
        $statement->setFetchMode(PDO::FETCH_CLASS, static::MODEL_CLASS);
        return $statement;
    }

    //unused
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

    public function find($conditions=[],$clause=[]){

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
        //TODO init on class loaded.
        $config = ['host'=>'localhost','port'=>'3306','dbname'=>'mydb','username'=>'manager','password'=>'password'];
        self::setPDO(DBFactory::get($config));

        //ClassName
        $className = strtolower($model);

        if(!isset(self::$dao[$className]))
        {
            self::$dao[$className]=new $className();
            return self::$dao[$className];
        }else{
            return null;
        }
        return self::$dao[$className];
    }


    public static function getLastQuery(){
        return self::lastQuery;
    }

    private static function setLastQuery($query){
        self::$lastQuery = $query;
    }

    public static function getLastError()
    {
        return self::lastError;
    }

    private static function setLastError($error){
       self::$lastError = $error;
    }

    // general query methods
    public static function getAll($where='',$order='')
    {
        //TODO string check
        if(self::dao == null)return;
        $sql = 'SELECT * FROM '. self::$table . ' WHERE ' . $where . 'ORDER BY' . $order;
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
}