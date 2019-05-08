<?php
/**
 * User: lijiyun
 * Date: 2019/4/28
 * Time: 16:01
 */

/**
 * 单例模式的应用->数据库连接
 */
class MysqlConnect
{
    private static $conn;

    private function __construct()
    {
        self::$conn = mysqli_connect('127.0.0.1', 'root', 'root');
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getMysql()
    {
        if (!(self::$conn instanceof self)) {
            self::$conn = new self;
        }
        return self::$conn;
    }
}

$mysqlConnA = MysqlConnect::getMysql();
$mysqlConnB = MysqlConnect::getMysql();

if ($mysqlConnA === $mysqlConnB) {
    echo "数据库只有一个连接对象\n";
}