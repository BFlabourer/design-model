<?php
/**
 * Created by PhpStorm.
 * User: lijiyun
 * Date: 2019/5/8
 * Time: 16:53
 */
interface eventNotify
{
    public function notify($subject);
}

class userClass implements eventNotify
{
    public function notify($subject)
    {
        return "分班成功{$subject}\n";
    }
}

class userClassLog implements eventNotify
{
    public function notify($subject)
    {
        return "分班日志写入成功{$subject}\n";
    }
}

class userPhoneMsg implements eventNotify
{
    public function notify($subject)
    {
        return "用户短信通知成功{$subject}\n";
    }
}

interface eventList
{
    public function addEvent($event);
}

class Observer implements eventList
{
    public $_eventList = [];
    public $result = [];
    public function addEvent($event)
    {
        $this->_eventList[] = $event;
    }
    public function broadcast($subject)
    {
        foreach ($this->_eventList as $event)
        {
            $this->result[] = $event->notify($subject);
        }
    }
}

$observer = new Observer();
$observer->addEvent(new userClass());
$observer->addEvent(new userClassLog());
$observer->addEvent(new userPhoneMsg());
$observer->broadcast('小明');
var_dump($observer->result);
exit();