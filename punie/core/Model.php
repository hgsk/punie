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
    // interface
    abstract function isValid();
}