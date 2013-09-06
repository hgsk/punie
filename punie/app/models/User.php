<?
class User extends DAO
{
    private $name;
    private $age;
    private $gender;

    public function __construct($params)
    {
        //TODO retrieve from class name.
        parent::initialize('user');
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