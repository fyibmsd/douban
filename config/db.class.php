<?php
/**
 * Database class
 * 数据库抽象类
 */

abstract class db
{
    /**
     * 发送查询
     * @parms $sql 数据库查询语句
     * return mixed boolean/resource
     * */
    abstract public function query($sql);
    /**
     * 查询多行数据
     * @parms $sql select 型语句
     * return array/boolean
     * */
    abstract public function getRow($sql);
    /**
     * 查询单个数据
     * @parms $sql select型语句
     * return array/boolean
     * */
    abstract public function getOne($sql);
    /**
     * 自动执行insert/update语句
     * @parms $sql select型语句
     * return array/boolean
     * 自动拼接sql
     * */
    abstract public function autoExecute($table, $arr, $mode = 'insert', $where = '');
}

