<?php
namespace Admin\Controller;


class  VoteController extends AuthController {

    

    public function index(){
        $Vote=D('Vote');
        $this->assign('page',$Vote->page());
        $this->assign('list',$Vote->show());
        $this->display();
    }

    public function addVote(){
        $this->display();
    }

    public function addVoteAfter(){
        $Vote=D('Vote');
        $rid=$Vote->addVote(I('post.title'),I('post.info'));
        if ($rid) {
            $this->success('增加投票项目成功');
        }else{
            $this->error('增加投票项目失败');
        }
    }

    public function showChildVote(){
        $Vote=D('Vote');
        $this->assign('id',I('get.id'));
        $this->assign('list',$Vote->showChildVote(I('get.id')));
        $this->display();
    }

    public function addChildVote(){
        $this->assign('pid',I('get.id'));
        $this->display();
    }
    
    public function addChildAfter(){
        $Vote=D('Vote');
        $rid=$Vote->addChildVote(I('post.title'),I('post.info'),I('post.pid'));
        if ($rid) {
            $this->success('增加投票选择成功');
        }else{
            $this->error('增加子投票选择失败');
        }
    }

    public function update(){
        $Vote=D('Vote');
        $oneVote=$Vote->findOne(I('get.id'));
        $this->assign('oneVote',$oneVote);
        $this->display();
    }

    public function updateAfter(){
        $Vote=D('Vote');
        $rid=$Vote->update(I('post.id'),I('post.title'),I('post.info'),I('post.sort'));
        if ($rid) {
            $this->success('修改投票成功',U('Vote/index'));
        }else{
            $this->error('修改投票失败');
        }
        
    }

    public function delete(){
        $Vote=D('Vote');
        $rid=$Vote->deleteVote(I('get.id'));
        if ($rid) {
            $this->success('删除投票成功',U('Vote/index'));
        }else{
            $this->error('删除投票失败');
        }
    }

    public function first(){
        $Vote=D('Vote');
        $rid=$Vote->first(I('get.id'));
        if ($rid) {
            $this->success('显示成功',U('Vote/index'));
        }else{
            $this->error('显示失败');
        }
    }
    

    


}