<?php
namespace Admin\Controller;
use Think\Model;
class ManagerController extends AuthController {


    
    public function index(){
        $Manager=D('Manager');
        $this->assign('list',$Manager->show());
        $this->assign('page',$Manager->page());
        $this->display();
    }


    public function add(){
        $AuthRule=D('AuthRule');
        $rules=$AuthRule->show();
        $this->assign('rules',$rules);
        $this->display();
    }

    public function addAfter(){
        $Manager=D('Manager');
        $mId=$Manager->addManager(I('post.manager'),I('post.password'));
        $AuthGroup=D('AuthGroup');
        $aId=$AuthGroup->addAuth(I('post.title'),I('post.rules'));
        $AuthGroupAccess=D('AuthGroupAccess');
        $rId=$AuthGroupAccess->addGroup($mId,$aId);
        if ($rId==1) {
            $this->success('增加管理员成功');
        }else{
            $this->error('增加管理员失败');
        }

    }

    public function delete(){
        $Manager=D('Manager');
        $rid=$Manager->deleteManager(I('get.id'));
        if ($rid) {
            $this->success('删除管理员成功',U('Manager/index'));
        }else{
            $this->error('删除管理员失败');
        }
    }

   
    

    


}