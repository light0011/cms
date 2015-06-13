<?php

namespace Admin\Model;

use Think\Model;



class AuthGroupAccessModel extends Model{

    public function addGroup($mId,$aId){
        
        $data['uid']=$mId;
        $data['group_id']=$aId;
        return $this->add($data);
    }



}