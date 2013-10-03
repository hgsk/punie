<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 2013/09/06
 * Time: 14:35
 */

class UserMapper extends DataMapper
{
    protected $fields = [
        'id' => ['type'=> 'int', 'primary' => true],
        'username' => ['type'=> 'string', 'required' => true],
        'password' => ['type'=> 'string', 'required' => true],
        'email' => ['type'=> 'string', 'required' => true]
        ];

    /**
     * @param Collection or Model Object $data
     * @return int InsertId
     * @throws InvalidArgumentException
     */

    public function insert($model){
        $statement = $this->prepare([
            "sql"=>"INSERT INTO users(name) VALUES (:name);"
            ,
            "params"=>[
                ":name"=>$model->getName()
                ]
            ]
        );
        return $this->execute($statement);
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
    function all(){
        $statement = $this->prepare([
                "sql"=>"SELECT * FROM users;"
            ]
        );
        return $this->execute($statement);

    }

    public function getUserIdsScopedByGender($gender){
        if($this->db == null)return;
        $statement = $this->prepare([
                "sql"=> "SELECT id FROM users WHERE gender = 1 ORDER BY id ASC;"
            ]
        );

        return $this->execute($statement);
    }
}


