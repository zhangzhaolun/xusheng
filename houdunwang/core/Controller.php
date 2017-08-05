<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2017/7/29
 * Time: 14:22
 */

namespace houdunwang\core;


class Controller{
    private $url="window.history.back()";
    private $template;
    private $msg;

    /**
     * 跳转
     * @param $url
     * @return $this
     */
    protected function setRedirect($url){
        $this->url = "location.href='{$url}'";
        return $this;
    }

    /**
     * 成功
     * @return string
     */
    protected  function  success($msg){
        $this->msg=$msg;
        $this->template = "./view/success.php";
        return $this;
    }
    /**
     * 失败
     * @return string
     */
    protected  function  error($msg){
        $this->msg=$msg;
        $this->template = "./view/error.php";
        return $this;
    }
    public function __toString(){
        // TODO: Implement __toString() method.
        include $this->template;
        return '';
    }
}