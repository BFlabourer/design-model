<?php
/**
 * User: lijiyun
 * Date: 2019/4/28
 * Time: 17:07
 */
class Multiton{

    // 多个实例的数组
    private static $instanceArr = [];

    // 私有__construct(),防止外部创建对象
    private function __construct($arr)
    {
        $this->ip = $arr[0];
        $this->user = $arr[1];
        $this->password = $arr[2];
    }

    // 私有__clone(),防止外部clone对象
    private function __clone()
    {

    }

    /**
     * 返回包含多个实例的
     */
    public static function getInstance($dbName, $conf)
    {
        if (!(array_key_exists($dbName, self::$instanceArr))) {
            self::$instanceArr[$dbName] = new self($conf[$dbName]);
        }
        return self::$instanceArr[$dbName];
    }
}
//配置
$conf = [
    'A' => ['127.0.0.1', 'root', 'root'],
    'B' => ['192.168.0.1', 'root', 'root']
];
// 测试
$dbA = Multiton::getInstance('A', $conf);
$dbB = Multiton::getInstance('B', $conf);
$dbC = Multiton::getInstance('A', $conf);
if ($dbC === $dbA) {
    echo "A只有一个实例\n";
}

if ($dbA === $dbB) {
    echo "A和B是同一个实例\n";
}elseif ($dbA == $dbB) {
    echo "A和B是是2个实例，对象的属性相同\n";
}else{
    echo "A和B是是2个实例，对象的属性不同\n";
}
