<?php
namespace Admin\Controller;


class CommentController extends AuthController {

    

    public function index(){

        $Comment=D('Comment');
        $this->assign('list',$Comment->show());
        $this->assign('page',$Comment->page());
        $this->display();
    }

    public function update(){
        $Comment=D('Comment');
        $oneComment=$Comment->findOne(I('get.id'));
        $this->assign('oneComment',$oneComment);
        $this->display();
    }
    

    public function updateAfter(){
        $Comment=D('Comment');
        $rid=$Comment->update(I('id'),I('state'));
        if ($rid>0) {
            $this->success('修改评论成功',U('Comment/index'));
        }else{
            $this->error('修改评论失败');
        }
    }

   
    

    


}