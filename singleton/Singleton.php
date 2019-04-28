<?php

/**
 * 单例模式
 * 类的实例只能有一个
 */

class Singleton{
    // 私有静态变量保存对象
    private static $myInstance;

    //私有构造方法，防止类外部实例化
    private function __construct()
    {

    }

    // 私有__clone方法，防止类外部clone对象
    private function __clone()
    {

    }

    // 返回类唯一对象方法
    public static function getInstance()
    {
        if (!(self::$myInstance instanceof self)) {
            self::$myInstance = new self;
        }
        return self::$myInstance;
    }
}

//测试
$instanceA = Singleton::getInstance();
$instanceB = Singleton::getInstance();

if ($instanceA === $instanceB) {
    echo "只有一个类对象,是一个单例模式\n";
} else {
    echo "有多个类对象，不是单例模式\n";
}