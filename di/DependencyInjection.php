<?php
/**
 * Created by PhpStorm.
 * User: lijiyun
 * Date: 2019/5/8
 * Time: 10:31
 */
class Dbconfig
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    public function __construct($host, $dbname, $username, $password)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function getHost()
    {
        echo $this->host."\n";
    }
}

class Db
{
    private $conf;
    private $db;
    public function __construct(Dbconfig $dbconf)
    {
        $this->conf = $dbconf;
    }
    public function getConnect()
    {
        $this->conf->getHost();
    }
}

$Dbconfig = new Dbconfig('127.0.0.1', 'user', 'root', 'root');
$db = new Db($Dbconfig);
$db->getConnect();