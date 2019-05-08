<?php
/**
 * Created by PhpStorm.
 * User: lijiyun
 * Date: 2019/5/8
 * Time: 11:38
 */
interface Subject
{
    public function say();
    public function run();
}

class RealSubject implements Subject
{
    private $_name;
    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function say()
    {
        echo $this->_name."在说话\n";
    }

    public function run()
    {
        echo $this->_name."在跑步\n";
    }
}

class Proxy implements Subject
{
    private $_realSubject;
    public function __construct(RealSubject $realSubject)
    {
        $this->_realSubject = $realSubject;
    }

    public function say()
    {
        $this->_realSubject->say();
    }

    public function run()
    {
        $this->_realSubject->run();
    }
}

$proxy = new Proxy(new RealSubject('小明'));
$proxy->say();
$proxy->run();