<?php
class User extends Model
{
    protected $id;
    protected $name;
    protected $age;
    protected $gender;
    protected $birthday;

    function __construct(){
    }
    public function isValid(){
        //sample validation
        $val = $this->name;
        // length <100, required.
        if(empty($val)||!mb_check_encoding($val)||mb_strlen($val)> 100){
            return false;
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        //TODO birthdayから算出するロジック
        return 100;
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
}