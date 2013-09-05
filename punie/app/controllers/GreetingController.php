<?php

class GreetingController{

    public function hello(){
        $user = User.find(1);

        include(ROOT_PATH.'/app/views/greeting.php');
    }
}
