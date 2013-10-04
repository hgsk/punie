<?php
/**
 * Class Test
 * Model and DataMapper Tests
 */
class Test extends PHPUnit_Framework_TestCase
{
    /**
     *  Testing User Model getter/setter
     */
    /**
     * @var User
     */
    private $user;
    /**
     * @var PDO
     */
    private $pdo;
    public function setUp(){
        // connect db
        //$this->pdo = new PDO("sqlite::memory:");
        $this->pdo = new PDO("sqlite:db.sqlite");
        $userMapper = new UserMapper($this->pdo);

        // create User object
        $name = "John";
        $birthday = "1988/01/01";
        $this->user=new User();
        $this->user->setName('hgsk');
        $this->user->setBirthday('1985/01/01');

        // fixture
        $this->pdo->query("drop table users;");
        $this->pdo->query("drop table entries;");
        $this->pdo->query("create table entries(id integer ,name string);");
        $this->pdo->query("create table users(id integer ,name string, birthday string);");
        $this->pdo->query("insert into entries values (1,'hoge')");
    }
    public function test_user_fields_is_accessible(){
        // test User object
        $this->assertEquals("hgsk",$this->user->getName());
        $this->assertEquals('1985/01/01',$this->user->getBirthday());
    }

    public function test_userMapper_Insert_And_fetchAll(){

        $userMapper = new UserMapper($this->pdo);
        $userMapper->insert($this->user);
        $userMapper->insert($this->user);
        $u = $userMapper->all();
        $this->assertEquals("hgsk",$u[0]->getName());

    }
    public function testPDO(){
        $stmt = $this->pdo->query("select * from entries;");
        $stmt->setFetchMode(PDO::FETCH_CLASS,"Entry");
        $r=$stmt->fetchAll();
        $this->assertEquals("hoge",$r[0]->getName());
    }

}
?>
