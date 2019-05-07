<?php

/**
 * 抽象化角色
 * 抽象化给出的定义，并保存一个对实现化对象的引用
 */
abstract class Abstraction
{
    protected $imp;

    public function operation()
    {
        $this->imp->operationImp();
    }
}

/**
 * 修正抽象化角色
 * 扩展抽象化角色，改变和修正父类对抽象化的定义
 */
class RefineAbstraction extends Abstraction
{
    public function __construct(Implement $imp)
    {
        $this->imp = $imp;
    }

    public function operation()
    {
        echo "RefineAbstraction operation\n";
        $this->imp->operationImp();
    }
}

/**
 * 实现化角色
 * 给出实现化接口的定义但是不具体实现
 */
abstract class Implement
{
    abstract public function operationImp();
}

/**
 * 具体化角色A
 * 给出实现化角色接口的具体实现
 */
class ConcreteImplementA extends Implement
{
    public function operationImp()
    {
        echo "concrete implement A operation\n";
    }
}

/**
 * 具体化角色B
 * 给出实现化角色接口的具体实现
 */
class ConcreteImplementB extends Implement
{
    public function operationImp()
    {
        echo "concrete implement B operation\n ";
    }
}

$refineAbstraction = new RefineAbstraction(new ConcreteImplementA());
$refineAbstraction->operation();
$refineAbstraction = new RefineAbstraction(new ConcreteImplementB());
$refineAbstraction->operation();