<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 2013/09/06
 * Time: 14:35
 */

class UserMapper extends DataMapper
{
    private $model_class = "User";
    protected $table = "users";

    protected $fields = [
        'id' => ['type'=> 'int', 'primary' => true],
        'username' => ['type'=> 'string', 'required' => true],
        'password' => ['type'=> 'string', 'required' => true],
        'email' => ['type'=> 'string', 'required' => true]
        ];

    function insert($data){
        $statement = $this->$pdo->prepare(
            'INSERT INTO users(id,username,password,email) VALUES(?,?,?,?)'
        );
        $statement->bindParam(1,$id,PDO::PARAM_STR);
        $statement->bindParam(2,$username,PDO::PARAM_STR);
        $statement->bindParam(3,$password,PDO::PARAM_STR);
        $statement->bindParam(4,$email,PDO::PARAM_STR);

        if(!is_array($data)){
            $data = [$data];
        }
        foreach($data as $row){
            if(! $row instanceof $this->model_class || $row->isValid()){
                throw new InvalidArgumentException;
            }
            $id = $row->id;
            $username= $row->username;
            $password= $row->password;
            $email= $row->email;
            $statement->execute();

            $row->entryId = $pdo->lastInsertId();
        }
    }

    //TODO Relation

    function find($id){
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $statement->bindParam(1,$id,PDO::PARAM_INT);
        $statement->execute();
        $this->_decorate($statement);
        return $statement->fetch();
    }
    function all(){
        $statement = $this->pdo->query('SELECT * FROM users');
        return $this->_decorate($statement);
    }
}


