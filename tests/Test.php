<?php
require_once "../punie/core/Model.php";
class Test extends PHPUnit_Framework_TestCase
{
      public function testPushAndPop()
            {
                      $stack = array();
                              $this->assertEquals(0, count($stack));
                       
                              array_push($stack, 'foo');
                                      $this->assertEquals('foo', $stack[count($stack)-1]);
                                      $this->assertEquals(1, count($stack));
                                       
                                              $this->assertEquals('foo', array_pop($stack));
                                              $this->assertEquals(0, count($stack));
      }
      public function testUser(){
          require_once "../punie/app/models/User.php";
          // test
          $name = "hoge";
          $birthday = "1988/01/01";
          $user=new User(["name"=>$name, "birthday"=>$birthday]);
          // assert
          $this->assertEquals("hoge",$user->getName());
          $this->assertEquals($birthday,$user->getBirthday());
      }
      public function testConfigException(){
          require_once "../punie/core/Config.php";
          try{
              var_dump(Config::getConfig("hoge"));
          }catch(Exception $e){
              $this->assertTrue(true);
          }
      }
    public function testConfigDB(){
        require_once "../punie/core/Config.php";
        $this->assertNotNull(Config::getConfig("db"));
    }

}
?>
