<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 2013/09/05
 * Time: 15:20
 */

abstract class DBManager
{
    //singleton
    protected static $db;
    function __construct ($config)
    {
        try{
            $connection = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
            $this->db = new PDO($connection,
                $config['username'],
                $config[password],
                [PDO::ATTR_PERSISTENT=>true
                ,PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'
                ]
            );
        }catch(PDOException $e)
        {
            die(__CLASS__.': '.$e->getMessage());
        }
    }
    public function get(){
        return $this->db;
    }
}
