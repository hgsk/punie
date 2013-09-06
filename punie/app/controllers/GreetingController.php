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
        $user = User.find(1);

        include(ROOT_PATH.'/app/views/greeting.php');
    }
}
