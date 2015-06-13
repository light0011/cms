<?php

namespace Admin\Model;

use Think\Model;

use Think\Page;

class NavModel extends Model{

    //管理员帐号自动验证
    // protected $_validate = array(
    //     //-1,'帐号长度不合法！'
    //     array('manager', '/^[^@]{2,20}$/i', -1, self::EXISTS_VALIDATE),
    //     //-2,'密码长度不合法！'
    //     array('password', '6,30', -2, self::EXISTS_VALIDATE,'length'),
    // );
    

    public function page(){
        $count = $this->where('pid=0')->count();// 查询满足要求的总记录数
        $Page= new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show= $Page->show();// 分页显示输出
        return $show;
    }

   
    public function  show(){
        $map['pid']=0;
        $num=10;
        $p=$_GET['p'] ? $_GET['p'] : 1;
        $page=($p-1)*$num;
        return $this->field('id,name,info,sort')->where($map)->order('sort DESC')->limit($page.',10')->select();
    }

    
    public function addChildNav($name,$info,$pid){
        $data=array();
        $data['name']=$name;
        $data['info']=$info;
        $data['pid']=$pid;
        return $this->add($data);
    }

    public function showChildNav($pid){
        $map['pid']=$pid;
        return $this->field('id,name,info,pid,sort')->where($map)->order('sort DESC')->select();
    }

    public function addNav($name,$info){
        $data=array();
        $data['name']=$name;
        $data['info']=$info;
        $data['pid']=0;
        return $this->add($data);
    }

    public function findOne($id){
        $map['id']=$id;
        return $this->field('id,name,info,sort')->where($map)->find();
    }

    public function findAll(){
        $mainNav=$this->field('id,name,pid')->where("pid=0")->select();
        foreach ($mainNav as $key => $value) {
            $map['pid']=$value['id'];
            $mainNav[$key]['child']=$this->field('id,name,pid')->where($map)->select();
        }
        return $mainNav;
    }

    public function update($id,$name,$info,$sort){
        $data['id']=$id;
        $data['name']=$name;
        $data['info']=$info;
        $data['sort']=$sort;
        return $this->save($data);
    }

    public function deleteNav($id){
        return $this->delete($id);
    }

    public function sort($sort){

        if (is_array($sort)) {
            foreach ($sort as $key => $value) {
                $data['id']=$key;
                $data['sort']=$value;
                $this->save($data);
            }
        }
        return 1;
    }



}