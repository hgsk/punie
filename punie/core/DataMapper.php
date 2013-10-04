<?php
abstract class DataMapper
{
    protected $pdo;
    protected static $lastQuery;
    protected static $lastError;

    public function __construct(PDO $pdo){
       $this->pdo = $pdo;
       $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    }

    /**
     * PDO::prepare wrapper
     * @param $params
     */
    protected function prepare($params){
        $stmt = $this->pdo->prepare($params["sql"]);
        $stmt->bindParam(":name",$params["params"][":name"]);
        return $stmt;
    }

    /**
     * PDOStatement::execute & fetch wrapper
     * @param PDOStatement $statement
     */
    protected function execute(PDOStatement $statement){
        $statement->execute();
        //TODO return result
        return true;
    }
}