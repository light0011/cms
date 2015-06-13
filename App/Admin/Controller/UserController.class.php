<?php
namespace Admin\Controller;


class  UserController extends AuthController {

    

    public function index(){
        $User=D('User');
        $this->assign('page',$User->page());
        $this->assign('list',$User->show());
        $this->display();
    }

    
    

    


}