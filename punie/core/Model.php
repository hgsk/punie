<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 2013/09/05
 * Time: 16:55
 */
abstract class Model
{
    //domain model
    // define type
    const
        BOOLEAN = 'boolean'
    ,   INTEGER = 'integer'
    ,   DOUBLE = 'double'
    ,   FLOAT = 'double'
    ,   STRING = 'string'
    ,   DATETIME = 'dateTime'
    ;

    // private
    protected $data = [];
    protected static $schema = [];
    protected $fields = [];

    // util
    function fromArray(array $array){
        foreach ($array as $key => $val){
            $this->__set($key,$val);
        }
    }

    abstract public function create($params);
    abstract public function find($params);
    // interface
    abstract function isValid();

    //constructor
    public function __construct($fields)
    {
        $this->fields = $fields;
    }
}