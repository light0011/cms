<?php

namespace Admin\Model;

use Think\Model;


use Think\Page;


class CommentModel extends Model{

    private $pageNum=10;


    
    public function page(){
        $count = $this->count();// 查询满足要求的总记录数
        $Page= new Page($count,$this->pageNum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show= $Page->show();// 分页显示输出
        return $show;
    }


    public function show(){
        $num=$this->pageNum;
        $p=$_GET['p'] ? $_GET['p'] : 1;
        $page=($p-1)*$num;
        $comments=$this->table('__COMMENT__ a,__CHAPTER__ b')->field('a.id,a.user,a.content,a.create,a.state,b.name')->where("a.cid=b.id")->order('a.create DESC')->limit($page.",$this->pageNum")->select();
        foreach ($comments as $key => $value) {
            $comments[$key]['create']=date('Y-m-d H:i:s',$comments[$key]['create']);
            $comments[$key]['sub_name']=mb_substr($comments[$key]['name'], 0,20,'utf-8');
        }
        return $comments;
    }


    public function findOne($id){
        return  $this->table('__COMMENT__ a,__CHAPTER__ b')->field('a.id,a.user,a.content,a.state,a.create,b.name')->where("a.cid=b.id AND a.id=$id")->find();
    }

    public function update($id,$state){
        $data=array();
        $data['id']=$id;
        $data['state']=$state;
        return $this->save($data);
    }

    


}