<?php

namespace Admin\Model;

use Think\Model;

use Think\Page;

class VoteModel extends Model{

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
        return $this->field('id,title,info,state')->where($map)->order('date DESC')->limit($page.',10')->select();
         
    }

    
    public function addChildVote($title,$info,$pid){
        $data=array();
        $data['title']=$title;
        $data['info']=$info;
        $data['pid']=$pid;
        $data['date']=time();
        return $this->add($data);
    }

    public function showChildVote($pid){
        $map['pid']=$pid;
        return $this->field('id,title,info,pid,count,state')->where($map)->order('date DESC')->select();
    }

    public function addVote($title,$info){
        $data=array();
        $data['title']=$title;
        $data['info']=$info;
        $data['pid']=0;
        $data['date']=time();
        return $this->add($data);
    }

    public function findOne($id){
        $map['id']=$id;
        return $this->field('id,title,info')->where($map)->find();
    }

    public function findAll(){
        $mainVote=$this->field('id,title,pid')->where("pid=0")->select();
        foreach ($mainVote as $key => $value) {
            $map['pid']=$value['id'];
            $mainVote[$key]['child']=$this->field('id,title,pid')->where($map)->select();
        }
        return $mainVote;
    }

    public function update($id,$title,$info){
        $data['id']=$id;
        $data['title']=$title;
        $data['info']=$info;
        return $this->save($data);
    }

    public function deleteVote($id){
        return $this->delete($id);
    }

    public function first($id){
        $data['state']=0;
        $this->where('1=1')->save($data);
        $data1['state']=1;
        return $this->where("id=$id")->save($data1);
    }
    



}