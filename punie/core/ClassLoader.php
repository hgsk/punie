<?php
class ClassLoader{
    private $dirs = [];

    public function __construct(){
        spl_autoload_register([$this,'loader']);
    }
    public function register($dir){
        $this->dirs[] = $dir;
    }
    public function loader($className){
        foreach($this->dirs as $dir){
            $file = $dir . '/' . $className . '.php';
            if(is_readable($file)){
                require $file;
                return;
            }
        }
    }
}