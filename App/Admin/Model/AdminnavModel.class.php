<?php

namespace Admin\Model;

use Think\Model;

class AdminnavModel extends Model{

    
    public function getNav($id=0){
        $map['nid']=$id;
        return $this->field('id,text,state,url')->where($map)->select();
    }
    

}