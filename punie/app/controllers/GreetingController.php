<?php

class GreetingController{

    public function hello(){
        /*
         * ideal caller
         *
         * $user = User.find(1);
         * $users = User.findByAge('>25');
         * $users = User.findByNameIncludes('Nick');
         * $courses = CourseAndSubject.findByOwnerId('1');
         *
         */

        //Data Mapper
        $user = new User(["name"=>"bob","birthday"=>"1988/01/01"]);
        // ideal call
        $users = User::create(["name"=>"bob","birthday"=>"1988/01/01"]);

        include(ROOT_PATH.'/app/views/greeting.php');
    }
}
