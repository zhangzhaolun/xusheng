<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2017/7/29
 * Time: 15:21
 */

namespace houdunwang\view;


class View{
    public static function __callStatic($name, $arguments){
        // TODO: Implement __callStatic() method.
        return  call_user_func_array([new Base(),$name],$arguments);
    }
}