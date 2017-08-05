<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2017/7/29
 * Time: 13:22
 */

namespace houdunwang\core;

/**
 * 框架启动类
 * Class Boot
 * @package houdunwang\core
 */
class Boot{
   public static function run(){
//       初始化框架
      self::init();
//       执行应用
       self::appRun();
   }
    private static function appRun(){
        $s = isset($_GET['s']) ? $_GET['s'] : 'home/entry/index';
        $arr=explode('/',$s);
//        p($arr);
        define('APP',$arr[0]);
        define('CONTROLLER',$arr[1]);
        define('ACTION',$arr[2]);
//       组合类名
        $className="app\\{$arr[0]}\controller\\".ucfirst($arr[1]);
//        调用控制器的方法
        echo call_user_func_array([new $className,$arr[2]],[]);
    }
    /**
     * 初始化
     */
    private static function init(){
//        开启session
        session_id()||session_start();
//        设置时区
        date_default_timezone_set("PRC");
//        定义是否提交的常量
        define('IS_POST',$_SERVER['REQUEST_METHOD']=='POST' ? true : false);

    }

}