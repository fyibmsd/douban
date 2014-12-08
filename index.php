<?php
/**
 * Index file
 * 主页文件
 */

	// 定义入口
	define('ACC', true);
	// 引入初始化文件
	require 'config/init.php';
	// App::run();
	$mysql = mysql::getInstance();
	