<?php
/**
 * Created by PhpStorm.
 * User: lijiyun
 * Date: 2019/4/29
 * Time: 15:22
 */

interface cache
{
    public function setValue($key, $val);
    public function getValue($key);
}

class fileCache implements cache
{
    private $_filePath = '/tmp/';

    public function setValue($key, $val){
        $key = $this->_filePath.$key.'.php';
        $value = 'file_cahce_test';
        return file_put_contents($key, $value);
    }

    public function getValue($key){
        $file = $this->_filePath.$key.'.php';
        if (is_file($file)) {
            return include $file;
        }
        return '';
    }
}

class redisCache implements cache
{
     private $_reCache = null;

     public function __construct($ip, $port)
     {
        $this->_reCache = new Redis();
        $this->_reCache->connect($ip, $port);
     }

     public function setValue($key, $val)
     {
         $val = serialize($val);
         return $this->_reCache->set($key, $val);
     }

     public function getValue($key)
     {
         $val = $this->_reCache->get($key);
         return unserialize($val);
     }
}

$cache = new redisCache('127.0.0.1', '6379');
$cache->setValue('test', 'test');
return $cache->getValue('test');

$cache = new fileCache();
$cache->setValue('test1', 'testfile');
return $cache->getValue('test1');
