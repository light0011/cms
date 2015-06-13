<?php
namespace Admin\Controller;


class  NavController extends AuthController {

    

    public function index(){
        $Nav=D('Nav');
        $this->assign('page',$Nav->page());
        $this->assign('list',$Nav->show());
        $this->display();
    }

    public function addNav(){
        $this->display();
    }

    public function addNavAfter(){
        $Nav=D('Nav');
        $rid=$Nav->addNav(I('post.name'),I('post.info'));
        if ($rid) {
            $this->success('增加导航成功');
        }else{
            $this->error('增加导航失败');
        }
    }

    public function showChildNav(){
        $Nav=D('Nav');
        $this->assign('id',I('get.id'));
        $this->assign('list',$Nav->showChildNav(I('get.id')));
        $this->display();
    }

    public function addChildNav(){
        $this->assign('pid',I('get.id'));
        $this->display();
    }
    
    public function addChildAfter(){
        $Nav=D('Nav');
        $rid=$Nav->addChildNav(I('post.name'),I('post.info'),I('post.pid'));
        if ($rid) {
            $this->success('增加子导航成功');
        }else{
            $this->error('增加子导航失败');
        }
    }

    public function update(){
        $Nav=D('Nav');
        $oneNav=$Nav->findOne(I('get.id'));
        $this->assign('oneNav',$oneNav);
        $this->display();
    }

    public function updateAfter(){
        $Nav=D('Nav');
        $rid=$Nav->update(I('post.id'),I('post.name'),I('post.info'),I('post.sort'));
        if ($rid) {
            $this->success('修改导航成功',U('Nav/index'));
        }else{
            $this->error('修改导航失败');
        }
        
    }

    public function delete(){
        $Nav=D('Nav');
        $rid=$Nav->deleteNav(I('get.id'));
        if ($rid) {
            $this->success('删除导航成功',U('Nav/index'));
        }else{
            $this->error('删除导航失败');
        }
    }

    public function sort(){
        $Nav=D('Nav');
        $rid=$Nav->sort(I('post.sort'));
        if ($rid) {
            $this->success('排序成功',U('Nav/index'));
        }else{
            $this->error('排序失败');
        }
    }
    

    


}