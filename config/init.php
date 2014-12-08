<?php
/**
 * Initialization file
 * 项目初始化文件
 */
// Access 权限控制
defined('ACC') || exit('Access Denied');
// 配置文件的根目录
define('INC_PATH', str_replace('\\', '/', dirname(__FILE__)));
// 系统配置文件
require_once INC_PATH . '/define.inc.php';
// 设置字符集
header("Content-type:text/html;charset=utf-8");

// __autoload php自动加载函数 尝试加载未定义的类 
function __autoload($class)
{
    $filename = $class . '.class.php';
    
    if(strtolower(substr($class, -5)) == 'model') {
        require APP_PATH . '/models/' . $filename;
    } elseif (strtolower(substr($class, -5)) == 'tool') {
        require APP_PATH . '/controllers/' . $filename;
    } else {
        require INC_PATH . '/' . $filename;
    }
}

// 设置报错级别
if(defined('DEBUG')) {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}
