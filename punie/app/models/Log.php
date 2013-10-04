<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 13/10/04
 * Time: 13:58
 */

class Log extends Model{

    private $date;
    private $referer;
    private $userAgent;
    private $requestHeader;

    /**
     * @var User
     */
    private $user;

    public function __construct($fields){
        $this->name = $fields["name"];
        $this->birthday = $fields["birthday"];
    }

    function isValid()
    {
        return true;
    }

    public function getUserName()
    {
        return $this->user->getName();
    }
}
