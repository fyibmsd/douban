<?php
/**
 * Mysql操作类
 */
class mysql extends db
{
    // 数据库句柄
    private $conn = null;
    // 数据库参数
    private $conf = array();
    // 保存类的实例的静态成员变量
    private static $ins = null;
    
    // 构造函数，初始化参数、选库、设定字符集
    private function __construct()
    {
        $this->conf = conf::getInstance();
        $this->conn = mysqli_connect($this->conf->host, $this->conf->user, $this->conf->passwd, $this->conf->db);
        $this->setChar($this->conf->char);
        if(!$this->conn) {
            // 抛出异常
            $err = new Exception('数据库连接失败');
            throw $err;
        }
    }
    // 防止对象被克隆
    public function __clone()
    {
        trigger_error('Clone is not allow!',E_USER_ERROR);
    }
    // 单例模式 访问这个实例的公共的静态方法
    public static function getInstance()
    {
        if(!(self::$ins instanceof self)) {
            self::$ins = new self;
        }
        return self::$ins;
    }
    // 自动合成sql
    public function autoExecute($table, $arr, $mode = 'insert', $where = ' where 1 limit 1')
    {
        if(!is_array($arr)) {
            return false;
        }
        
        if($mode == 'update') {
            $sql = 'update ' . $table . ' set ';
            foreach($arr as $key => $val) {
                $sql .= $key . '=' . $val . ',';
            }
            $sql = rtrim($sql, ',');
            $sql .= $where;
            return $this->query($sql);
        }
        
        $sql = 'insert into ' . $table . ' (' . implode(',', array_keys($arr)) . ')';
        $sql .= ' values (\'';
        $sql .= implode("','",array_values($arr));
        $sql .= '\')';
        return $this->query($sql);
    }

    public function getOne($sql)
    {
        $this->query($sql)->fetch_assoc();
    }

    public function getRow($sql)
    {
        return $this->query($sql)->fetch_row();
    }

    public function query($sql)
    {
    	if($this->conf->debug) {
    		$this->log($sql);
    	}
        $res = $this->conn->query($sql);
        log::write($sql);
        return $res;
    }
    
    private function setChar($char)
    {
        $sql = 'set names ' . $char;
        return $this->query($sql);
    }
}