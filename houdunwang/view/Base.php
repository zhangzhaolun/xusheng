<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2017/7/29
 * Time: 14:37
 */

namespace houdunwang\view;


class Base{
  //保存分配变量的属性
    private $data=[];
    //模板路径
    private $template;

    /*
     * 分配变量
     */
    public function with($data){
        $this->data=$data;
        return $this;
    }

    /*
     * 制作模板
     */
    public function make(){

        $this->template='../app/'.APP . ' /view/'.CONTROLLER . '/'.ACTION . '.php';
        return $this;
    }
    /**
     * 载入模板
     * @return string
     */
    public function __toString(){
        // TODO: Implement __toString() method.
//        把键名变为变量名，键值变成变量
        extract($this->data);
//        载入模板
        include $this->template;
//        这个方法必须返回字符串
        return '';
    }
}

