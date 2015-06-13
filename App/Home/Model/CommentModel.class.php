<?php

namespace Home\Model;

use Think\Model;

use Think\Page;

class CommentModel extends Model{

    private $pageNum=10;

    public function addComment($cid,$content,$manner){
        $cid=(int)$cid;
        $data=array();
        $data['cid']=$cid;
        $data['user']=cookie('username');
        $data['content']=$content;
        $data['manner']=$manner;
        $data['create']=time();
        return $this->add($data);

    }

    public function getNewThreeComment($cid){
        $cid=(int)$cid;
        $comments=$this->table('__COMMENT__ a,__USER__ b')->field('a.id,a.user,a.content,a.create,a.support,a.oppose,b.face')->where("a.cid=$cid AND a.user=b.username AND a.state=1")->limit('0,3')->order("a.create DESC")->select();

        foreach ($comments as $key => $value) {
            $comments[$key]['create']=date("Y-m-d H:i:s",$comments[$key]['create']);
        }
        return $comments;
    }

    public function getChapterCommentCount($cid){
        $cid=(int)$cid;
        return $this->where("cid=$cid AND state=1")->count();
    }

    public function setManner($id,$type){
        $id=(int)$id;
        $oneComment=$this->field('id,support,oppose')->where("id=$id")->find();
        $data=array();
        $data['id']=$id;
        if ($type=='support') {
            $data['support']=$oneComment['support']+1;
            $this->save($data); 
        }elseif($type=='oppose'){
            $data['oppose']=$oneComment['oppose']+1;
            $this->save($data); 
        }
        return 1;
    }

    public function getChapterComment($cid){
        $cid=(int)$cid;
        $num=$this->pageNum;
        $p=$_GET['p'] ? $_GET['p'] : 1;
        $page=($p-1)*$num;
        $comments=$this->table('__COMMENT__ a,__USER__ b')->field('a.id,a.user,a.content,a.create,a.support,a.oppose,b.face')->where("a.cid=$cid AND a.user=b.username AND a.state=1")->limit($page.",$this->pageNum")->order("a.create DESC")->select();
        foreach ($comments as $key => $value) {
            $comments[$key]['create']=date("Y-m-d H:i:s",$comments[$key]['create']);
        }
        return $comments;
    }

    public function page($cid){
        $cid=(int)$cid;
        $count =$this->getChapterCommentCount($cid);// 查询满足要求的总记录数
        $Page= new Page($count,$this->pageNum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show= $Page->show();// 分页显示输出
        return $show;
    }

    public function getHotThreeComment($cid){
        $cid=(int)$cid;
        $comments=$this->table('__COMMENT__ a,__USER__ b')->field('a.id,a.user,a.content,a.create,a.support,a.oppose,b.face')->where("a.cid=$cid AND a.user=b.username AND a.state=1 AND a.support + a.oppose >0")->limit('0,3')->order("a.support + a.oppose DESC")->select();

        foreach ($comments as $key => $value) {
            $comments[$key]['create']=date("Y-m-d H:i:s",$comments[$key]['create']);
        }
        return $comments;
    }

    

    

    
    


}