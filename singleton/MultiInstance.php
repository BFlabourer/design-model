<?php
/**
 * User: lijiyun
 * Date: 2019/4/28
 * Time: 15:23
 */

/**
 * @desc 多个类对象的情况,在单例模式中需要避免此类情况出现
 */

class MultiInstance {

}

//测试
$instanceA = new MultiInstance();
$instanceB = new MultiInstance();

if ($instanceA === $instanceB) {
    echo "同一个对象\n";
} else {
    echo "类外部可以创建多个对象,单例模式需要防止类外部new对象\n";
}

$instanceC = clone $instanceA;
if ($instanceC === $instanceA) {
    echo "clone对象与被clone对象是同一个对象\n";
} else {
    echo "clone会产生与被clone对象不同的对象，单例模式需要防止类外部clone对象\n";
}


