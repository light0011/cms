<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {

    public function index(){
        $this->display();
    }

    public function Login(){
        if (IS_AJAX) {
            $Manager=D('Manager');
            $rid=$Manager->checkManager(I('post.manager'),I('post.password'));
            echo $rid;
        }else{
            $this->error('非法访问');
        }
    }



    public function logout(){
        session('admin',null);
        session('id',null);
        $this->redirect('Login/index');
    }
    
}