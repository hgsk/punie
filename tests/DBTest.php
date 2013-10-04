<?php
/**
 * DBTest using Database_TestCase
 * Created by PhpStorm.
 * User: hgsk
 * Date: 13/10/04
 * Time: 11:33
 */

class DBTest extends PHPUnit_Extensions_Database_TestCase
{
    static private $pdo = null;

    private $conn = null;

    public function getConnection(){
        if($this->conn===null){
            if(self::$pdo==null){
                self::$pdo= new PDO('sqlite::memory:');
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo,':memory:');
        }
        return $this->conn;
    }

    /**
     * Returns the test dataset.
     *
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet()
    {
        return $this->createXMLDataSet('fixture.xml');
    }


    public function testDB(){
        echo $this->getDataSet();
        echo $this->getConnection()->getRowCount('guestbook');
    }
}
