<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 2013/09/06
 * Time: 17:45
 */

class Entry extends Model{

    // Field Type
    protected static $schema = [
        'id'=> parent::INTEGER
        ,'author'  => parent::STRING
        ,'title'  => parent::STRING
        ,'content'  => parent::STRING
        ,'published'  => parent::DATETIME
    ];

    function isValid()
    {
        //validation
        return true;
    }


} 