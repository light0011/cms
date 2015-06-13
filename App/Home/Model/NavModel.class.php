<?php

namespace Home\Model;

use Think\Model;

class NavModel extends Model{

    public function  getFrontTenNav(){
        $map['pid']=0;
        return $this->field('id,name')->where($map)->order('sort DESC')->limit('0,10')->select();
    }

    public function getFrontNav($id){
        $id=(int)$id;
        $nav=$this->where("id=$id")->find();
        if (!empty($nav)) {
            $mainNav=$childNav=$resultNav=array();
            $allNav=$this->field('id,name,pid')->order('sort DESC')->select();
            foreach ($allNav as $key => $value) {
                $value['pid']==0 ? $mainNav[]=$value : $childNav[]=$value;
                if ($value['id']==$id) {
                    $resultNav=$value;
                    $resultNav['sait'][0]=$value;
                }
                if ($value['pid']==$id) {
                    $resultNav['child'][]=$value;
                }
            }

            if ($resultNav['pid']!=0) {
                $child=$resultNav;
                foreach ($mainNav as $key => $value) {
                    if ($resultNav['pid']==$value['id']) {
                        $resultNav=$value;
                        $resultNav['sait'][0]=$value;

                    }
                }
                foreach ($childNav as $key => $value) {
                    if ($resultNav['id']==$value['pid']) {
                        $resultNav['child'][]=$value;
                        $resultNav['sait'][1]=$child;
                    }
                }

            }
            return $resultNav;

        }else{
            return 0;
        }
    }
    
    //文章详情页面的位置导航
    public function getChapterOne($oneNav){
        $oneNav=(int)$oneNav;
        return $this->field('id,name,pid')->where("id=$oneNav")->find();
    }

    //网站首页前四个栏目
    public function getFourNav(){
        return $this->field('id,name')->where("pid=0")->order('sort DESC')->limit('0,4')->select();
    }

    //根据主导航找到子导航
    public function getChildNav($pid){
        $pid=(int)$pid;
        return $this->field('id')->where("pid=$pid")->order('sort DESC')->select();
    }



}