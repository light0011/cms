<?php

namespace Admin\Model;

use Think\Model;




class AdModel extends Model{

    public function show(){
        return $this->field('id,title,content')->select();
    }

    public function findOne($id){
        $id=(int)$id;
        $oneAd=$this->field('id,title,url,content')->where("id=$id")->find();
        return $oneAd;
    }

    public function updateAd($id,$title,$content,$url){
        $data['id']=$id;
        $data['title']=$title;
        $data['content']=$content;
        $data['url']=$url;
        return $this->save($data);
    }

    


}