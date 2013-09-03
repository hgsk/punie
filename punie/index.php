<?php

namespace hoge{
    class Model{
        public static function getClassName(){
            return __CLASS__;
        }
    }
echo Model::getClassName();
}

