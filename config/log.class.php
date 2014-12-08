<?php
/**
 * log.class.php
 * 日志记录类
 * */

defined('ACC')||exit('Access Denied');

class log
{
	// 日志文件名
	const LOGFILE = 'curr.log';
	// 写日志
	public static function write($curr)
	{
		$curr .= "\r\n";
		$log = SITE_PATH . '/tmp/logs/curr.log';
		$fh = fopen($log, 'ab');
		fwrite($fh, $curr);
	}
}