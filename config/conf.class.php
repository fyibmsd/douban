<?php
/** 
 * 配置读写类
 */
class conf
{
    private static $ins = null;
    protected $data = array();
    
    // 一次性将配置文件信息读出来，并赋给成员变量，以后不必再调用配置文件
    final private function __construct()
    {        
        require_once INC_PATH . '/config.inc.php';
        $this->data = $_CFG;        
    }
    // 防止对象被克隆
    public function __clone()
    {
        trigger_error('Clone is not allow!',E_USER_ERROR);
    }
    // 单例模式
    public static function getInstance()
    {
        if(!(self::$ins instanceof self)) {
            self::$ins = new self;
        }
        return self::$ins;
    }
    // 用魔术方法控制读取data内的参数
    public function __get($key)
    {
        if(array_key_exists($key, $this->data)) {
            return $this->data[$key];
        } else {
            return null;
        }
    }
}
