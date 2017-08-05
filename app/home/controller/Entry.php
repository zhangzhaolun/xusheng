<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2017/7/29
 * Time: 12:06
 */

namespace app\home\controller;

use houdunwang\core\Controller;
use houdunwang\model\Model;
use houdunwang\view\View;

class Entry extends Controller{
    /*
     * 默认首页
     */
    public function index(){
        $data = Model::q("SELECT * FROM  arc");

       return View::with(compact('data','arc'))->make();
    }

    public function remove(){
        $sql="DELETE FROM  arc WHERE aid=".$_GET['aid'];
        Model::e($sql);
        return $this->success('删除成功！');
    }
    public function add(){
        if(IS_POST){
            $sql = "INSERT INTO arc (title) VALUES ('{$_POST['title']}')";
        Model::e($sql);
        return $this->success('添加成功!')->setRedirect('index.php');
        }
        return View::make();
    }

    /**
     * 搜索功能
     */
    public function search(){
        $wd = $_GET['wd'];
        //转义
        $wd = addslashes($wd);
        $sql = "SELECT * FROM arc WHERE title LIKE '%{$wd}%'";
        $data = Model::q($sql);
        return View::with(compact('data'))->make();

    }
    /**
     * 修改
     */
    public function update(){
        $aid = $_GET['aid'];
        if(IS_POST){
            $sql = "UPDATE arc SET title='{$_POST['title']}' WHERE aid=$aid";
            Model::e($sql);
            return $this->success('添加成功!')->setRedirect('index.php');
        }
        $sql = "SELECT * FROM arc WHERE aid=$aid";
        $data = Model::q($sql);
        //二维数组变为一维数组
        $oldData = current($data);
        //compact('oldData')相当于 ['oldData'=>$oldData]
        return View::with(compact('oldData'))->make();
    }

}