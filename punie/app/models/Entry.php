<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 13/10/04
 * Time: 16:58
 */

class Entry extends Model{

    protected $id;
    protected $name;
    public function __construct(){
    }
    public function isValid(){
        return true;
    }

    public function getName(){
        return $this->name;
    }
}