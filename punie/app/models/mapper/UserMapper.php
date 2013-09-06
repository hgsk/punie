<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 2013/09/06
 * Time: 14:35
 */

class UserMapper extends DataMapper
{
    const MODEL = "User";
    protected $table = "users";

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
    function insert($data){
        $modelClass = self::MODEL;
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
            if(! $row instanceof $modelClass || $row->isValid()){
                throw new InvalidArgumentException;
            }
            $id = $row->id;
            $username= $row->username;
            $password= $row->password;
            $email= $row->email;
            $statement->execute();

            $row->entryId = $pdo->lastInsertId();
        }
        return $pdo->lastInsertId();
    }

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

    public function getUsersByGender($gender){
        if($this->db == null)return;
        $template = 'SELECT %s FROM %s WHERE %s ORDER BY %s limit %s';

        $column = 'name';
        $table = 'users';
        $condition = 'age > 12';
        $order = 'asc';
        $limit = '100';

        $sql = sprintf($template,$column,$table,$condition,$order,$limit);

        $response = $this->db->query($sql);
        if(response!=null){
            return $response;
        }
        return null;
    }
}


