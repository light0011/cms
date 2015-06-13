<?php
namespace Home\Controller;
use Think\Controller;

class VoteController extends Controller {
    
    public function vote(){
        if (IS_AJAX) {
            $Vote = D('Vote');
            $rid = $Vote->vote(I('post.id'));
            echo $rid;
        } else {
            $this->error('非法访问！');
        }
    }
    




}