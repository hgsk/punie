<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 2013/09/05
 * Time: 16:55
 */
abstract class Model
{
    const
        BOOLEAN = 'boolean'
    ,   INTEGER = 'integer'
    ,   DOUBLE = 'double'
    ,   FLOAT = 'double'
    ,   STRING = 'string'
    ,   DATETIME = 'dateTime'
    ;

    protected $data = [];
    protected static $schema = [];

    function __get($prop){
        if(isset($this->data[$prop])){
            return $this->data[$prop];
        }elseif(isset(static::$schema[$prop])){
            return null;
        }else{
            throw new InvalidArgumentException;
        }
    }
    function __isset($prop){
        return isset($this->data[$prop]);
    }

    function __set($prop,$val){
        if(!isset(static::$schema[$prop])){
            throw new InvalidArgumentException($prop. 'cannot set.');
        }
        $schema = static::$schema[$prop];
        $type = gettype($val);
        if($schema === self::DATETIME){
            if($val instanceof DateTime){
                $this->data[$prop] = $val;
            }else{
                $this->data[$prop] = new DateTime($val);
            }
            return;
        }
        if($type === $schema){
            $this->data[$prop] = $val;
            return;
        }
        switch($schema){
            case self::BOOLEAN:
                return $this->data[$prop] = (bool)$val;
            case self::INTEGER:
                return $this->data[$prop] = (int)$val;
            case self::DOUBLE:
                return $this->data[$prop] = (double)$val;
            case self::STRING:
                return $this->data[$prop] = (string)$val;
        }
    }

    function toArray(){
        return $this->data;
    }


    function fromArray(array $array){
        foreach ($array as $key => $val){
            $this->__set($key,$val);
        }
    }

    abstract function isValid();

    public function __construct($fields)
    {
        $this->fields = $fields;
    }
}