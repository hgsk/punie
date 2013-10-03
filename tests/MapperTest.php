<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 13/10/03
 * Time: 17:00
 */

class PDOContainerTest extends PHPUnit_Framework_TestCase
{
    private $mockPDO;
    public function setUp(){
        $this->mockPDO = $this->getMock('PDO',['query'],['sqlite:memory']);
    }
    public function testPDO(){
        $this->mockPDO->expects($this->any())->method('query')->will($this->returnValue(new PDOStatement()));
    }
}
class MapperTest extends PHPUnit_Framework_TestCase
{
    private $mockPDO;
    public function setUp(){
        require_once "../punie/core/DataMapper.php";
        require_once "../punie/core/Model.php";
        require_once "../punie/app/models/mapper/UserMapper.php";
        require_once "../punie/app/models//User.php";
        $this->mockPDO = $this->getMock('PDO',['query'],['sqlite:memory']);
    }
    public function testUser(){
        $user = new User(["name"=>"hgsk","birthday"=>"1992/10/01"]);
        $this->assertEquals($user->getName(),"hgsk");
        $this->assertEquals($user->getBirthday(),"1992/10/01");
    }

    public function testMapper(){
    }
    public function testUserMapper(){
        $userMapper = new UserMapper($this->mockPDO);
        $userMapper->find(1);
        /*
        $user = new User(["name"=>"hgsk","birthday"=>"1992/10/01"]);
        $userMapper->insert($user);
        */
    }
}