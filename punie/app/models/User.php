<?
class User extends DAO
{
    private $name;
    private $age;
    private $gender;

    public function __construct($params)
    {
        //TODO retrieve from class name.
        parent::__construct('user');
    }
    public function getUsersByGender($gender){
        if($this->db == null)return;
        $sql = 'SELECT FROM ' . $this->table . ' WHERE gender =' . $gender .'';
        $response = $this->db->query(sql);
        if(response!=null){
            return $response;
        }
        return null;
    }
}