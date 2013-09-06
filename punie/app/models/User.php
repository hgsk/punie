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