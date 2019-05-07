<?php
/**
 * Created by PhpStorm.
 * User: lijiyun
 * Date: 2019/5/7
 * Time: 15:14
 */

/**
 * 类适配器
 */
interface Target
{
    public function method1();
    public function method2();
}

class Adaptee
{
    public function method1()
    {
        echo "源类与目标接口都有的方法\n";
    }
}

class Adapter extends Adaptee implements Target
{
    public function method2()
    {
        echo "目标接口独有的方法\n";
    }
}

$adapter = new Adapter();
$adapter->method1();
$adapter->method2();

/**
 * 对象适配器
 */
interface Target2
{
    public function method1();
    public function method2();
}

class Adaptee2
{
    public function method1()
    {
        echo "源类与目标接口都有的方法\n";
    }
}

class Adapter2 implements Target2
{
    private $_adptee2;
    public function __construct(Adaptee2 $adaptee2)
    {
        $this->_adptee2 = $adaptee2;
    }

    public function method1()
    {
        echo $this->_adptee2->method1();
    }

    public function method2()
    {
        echo "目标接口独有的方法\n";
    }
}

$adapter2 = new Adapter2(new Adaptee2());
$adapter2->method1();
$adapter2->method2();