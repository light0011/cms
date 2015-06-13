<?php

namespace Admin\Model;

use Think\Model;

use Think\Page;

class UserModel extends Model{

    //管理员帐号自动验证
    // protected $_validate = array(
    //     //-1,'帐号长度不合法！'
    //     array('manager', '/^[^@]{2,20}$/i', -1, self::EXISTS_VALIDATE),
    //     //-2,'密码长度不合法！'
    //     array('password', '6,30', -2, self::EXISTS_VALIDATE,'length'),
    // );
    

    public function page(){
        $count = $this->count();// 查询满足要求的总记录数
        $Page= new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show= $Page->show();// 分页显示输出
        return $show;
    }

   
    public function  show(){
        $map['pid']=0;
        $num=10;
        $p=$_GET['p'] ? $_GET['p'] : 1;
        $page=($p-1)*$num;
        return $this->field('id,username')->where($map)->order('last_login DESC')->limit($page.',10')->select();
         
    }

    
    



}