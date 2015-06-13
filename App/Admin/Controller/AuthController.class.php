<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Auth;

class AuthController extends Controller {

    protected function _initialize(){
        if (!session('admin')) {
            $this->redirect('Login/index');
        }


        $Auth=new Auth();
        if (!$Auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/',session('id'))) {
            echo "<span style='color : red;'>对不起，您没有权限操作此栏目！</span>";
            exit();
        }

    }

   
    

    


}