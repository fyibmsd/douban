<?php

/* 
 * 程序入口类
 */

// Access 权限控制
defined('ACC') || exit('Access Denied');

class App
{
    public function run()
    {
        require TPL_PATH . '/book/' . 'index.html';
    }
}
