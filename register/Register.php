<?php
/**
 * Created by PhpStorm.
 * User: lijiyun
 * Date: 2019/5/8
 * Time: 16:09
 */
class Register
{
    protected $container = [];
    public function set($key, $obj)
    {
        if (!isset($this->container[$key])) {
            $this->container[$key] = $obj;
        }
    }

    public function get($key)
    {
        return isset($this->container[$key]) ? $this->container[$key] : '';
    }

    public function getList()
    {
        return $this->container;
    }
}


$register = new Register();
$register->set('A', '对象1');
$register->set('B', '对象2');
$list = $register->getList();
var_dump($list);
exit();