<?php

namespace Admin\Model;

use Think\Model;



class AuthGroupModel extends Model{

    public function addAuth($title,$rules){
        if (is_array($rules)) {
            $rules=implode(',',$rules);
        }
        $data['title']=$title;
        $data['rules']=$rules;
        $data['status']=1;
        return $this->add($data);
    }



}