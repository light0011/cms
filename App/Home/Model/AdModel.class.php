<?php

namespace Home\Model;

use Think\Model;

class AdModel extends Model{

    public function getAll(){
        return $this->field('title,content,url')->select();
    }



}