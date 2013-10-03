<?php
class User extends Model
{
    private $name;
    private $age;
    private $gender;
    private $birthday;


    protected static $schema = [
            'id' => parent::INTEGER
        ,   'name' => parent::STRING
        ,   'password' => parent::STRING
        ,   'email' => parent::STRING
    ];


    public function __construct($fields){
        $this->name = $fields["name"];
        $this->birthday = $fields["birthday"];
    }
    public function isValid(){

        $val = $this->name;
        // length <100, required.
        if(empty($val)||!mb_check_encoding($val)||mb_strlen($val)> 100){
            return false;
        }

        return true;

    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    public function create($params){
        $userMapper = new UserMapper(DBFactory::get());
    }
    public function find($param){

    }
}