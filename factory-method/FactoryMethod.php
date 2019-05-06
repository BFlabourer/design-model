<?php

interface dataSave
{
    public function connect();
}

class mysql implements dataSave
{
    public function connect()
    {
        mysqli_connect('127.0.0.1', 'root', 'root');
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

interface factory
{
    public function getInstance();
}

class redisFactory implements factory
{
    public function getInstance()
    {
        return new redis();
    }
}

class mysqlFactory implements factory
{
    public function getInstance()
    {
        return new mysql();
    }
}

$mysqlFactory = new mysqlFactory();
$mysql = $mysqlFactory->getInstance();
$mysql->connect();

$redisFactory = new redisFactory();
$redis = $redisFactory->getInstance();
$redis->connect();


