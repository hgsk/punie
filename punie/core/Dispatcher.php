<?php

class Dispatcher{
    public function dispatch($url){
        //get params
        $params = explode('/',$url);

        //get controller
        $controllerName = $params[0];
        $className= ucfirst(strtolower($controllerName)). 'Controller';
        require(ROOT_PATH.'/app/controllers/'.$className.'.php');
        $url ="/";
        foreach($params as $key=>$param){
            $url = $url.$params[$key].'/';
        }
        $controller= new $className($url);

        //get action
        $action=$params[1];
        $controller->$action();

    }
}
