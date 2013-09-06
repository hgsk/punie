<?
class User extends Model
{
    private $name;
    private $age;
    private $gender;


    protected static $schema = [
            'id' => parent::INTEGER
        ,   'name' => parent::STRING
        ,   'password' => parent::STRING
        ,   'email' => parent::STRING
    ];

    public function isValid(){

        $val = $this->name;
        // length <100, required.
        if(empty($val)||!mb_check_encoding($val)||mb_strlen($val)> 100){
            return false;
        }

        return true;

    }

}