<?php

namespace Admin\Model;

use Think\Model;



class AuthRuleModel extends Model{

    public function show(){
        return $this->field('id,title')->select();
    }



}