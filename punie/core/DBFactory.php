<?php
/**
 * Created by PhpStorm.
 * User: hgsk
 * Date: 2013/09/05
 * Time: 15:20
 */

class DBFactory
{
    /*
     * DB Connection Factory (for MySQL only)
     *
     */
    //singleton
    static $pdo;
    public static function get($config)
    {
        if(!isset(self::$pdo))
        {
            try{
                $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
                self::$pdo= new PDO($dsn,
                    $config['username'],
                    $config['password'],
                    [PDO::ATTR_PERSISTENT=>true
                    ,PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'
                    ]
                );
            }catch(PDOException $e)
            {
                die(__CLASS__.': '.$e->getMessage());
            }
        }
        return self::$pdo;
    }
}
