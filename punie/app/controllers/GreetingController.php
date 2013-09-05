<?php

class GreetingController{

    public function hello(){
        $str = 'controller.hello.';
        include(ROOT_PATH.'/app/views/greeting.php');
    }
}
