<?php
/**
 * 系统参数配置文件
 * 
 */

// Access 权限控制
defined('ACC') || exit('Access Denied');
// 设置开发模式
define('DEBUG', true);
// 定义网站根目录
define('SITE_PATH', dirname('../'));
// 定义程序根目录
define('APP_PATH', SITE_PATH . '/application');
// 定义核心库路径
define('CORE_PATH', SITE_PATH . '/library');
// 定义模板路径
define('TPL_PATH', APP_PATH . '/views');    
    