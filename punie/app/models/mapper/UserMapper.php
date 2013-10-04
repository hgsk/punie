<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 2013/09/06
 * Time: 14:35
 */

class UserMapper extends DataMapper
{
    /**
     * @param Collection or Model Object $data
     * @return int InsertId
     * @throws InvalidArgumentException
     */

    public function insert(User $model){
        $statement = $this->prepare([
            "sql"=>"INSERT INTO users(name) VALUES (:name);",
                "params"=>[
                    ":name"=>$model->getName(),
                    ":birthday"=>$model->getBirthday(),
                ]
            ]
        );
        $this->execute($statement);
    }

    function find($id){
        $statement = $this->prepare([
                "sql"=>"SELECT * FROM users VALUES (:id);"
                ,
                "params"=>[
                    ":id"=>$id
                ]
            ]
        );
        return $this->execute($statement);
    }

    /**
     * @return array
     */
    function all(){
        $statement = $this->pdo->query(
               "SELECT * FROM users;"
        );
        // TODO FETCH_CLASSする場合、Modelの__construct()に引数を指定するとMissing argument 1 for User::__construct()となる。
        $statement->setFetchMode(PDO::FETCH_CLASS,'User');
        return $statement->fetchAll();
    }

    /**
     * @unused
     */
    /*
    public function getUserIdsScopedByGender($gender){
        if($this->db == null)return;
        $statement = $this->prepare([
                "sql"=> "SELECT id FROM users WHERE gender = 1 ORDER BY id ASC;"
            ]
        );

        return $this->execute($statement);
    }
    */
}


