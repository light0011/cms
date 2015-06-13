<?php
namespace Admin\Controller;


class IndexController extends AuthController {

    public function index(){

        $this->assign('admin',session('admin'));
        $this->display();

    }

    public function main(){
        $this->display();
    }

    

    


}