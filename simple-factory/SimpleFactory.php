<?php
/**
 * Created by PhpStorm.
 * User: lijiyun
 * Date: 2019/5/6
 * Time: 16:40
 */
interface dataSave
{
    public function connect();
}

class mysql implements dataSave
{
    public function connect()
    {
        $mysql = mysqli_connect('127.0.0.1', 'root', 'root');
        return $mysql;
    }
}

class redis implements dataSave
{
    public function connect()
    {
        $redis = new Redis();
        $redis->connect('127.0.0.1', '6379');
    }
}

class SimpleFactory
{
    //简单工厂类的静态方法
    public static function getMysql(){
        return new mysql();
    }
    public static function getRedis(){
        return new redis();
    }
}

$mysql = SimpleFactory::getMysql();
$mysql->connect();
$redis = SimpleFactory::getRedis();
$redis->connect();