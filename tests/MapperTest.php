<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 13/10/03
 * Time: 17:00
 */

class PDOContainerTest extends PHPUnit_Framework_TestCase
{
    public function testPDO(){
        $mock = $this->getMock('PDO',['query'],['sqlite:memory']);
        $mock->expects($this->any())->method('query')->will($this->returnValue(new PDOStatement()));
        $mock->query('SELECT * FROM users');
    }
}