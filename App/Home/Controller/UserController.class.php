<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Think\Upload;
use Think\Image;



class UserController extends Controller {
    //注册行为返回给Ajax
    public function register() {
        if (IS_AJAX) {
            $User = D('User');
            $uid = $User->register(I('post.username'), I('post.password'), I('post.repassword'),I('post.face'), I('post.verify'));
            echo $uid;
        } else {
            $this->error('非法访问！');
        }
    }
    
    //登录行为返回给Ajax
    public function login() {
        if (IS_AJAX) {
            $User = D('User');
            $uid = $User->login(I('post.username'), I('post.password'), I('post.auto'));
            echo $uid;
        } else {
            $this->error('非法访问！');
        }
    }
    
    //Ajax验证数据，帐号返回给Ajax
    public function checkUser() {
        if (IS_AJAX) {
            $User = D('User');
            $uid = $User->checkField(I('post.username'), 'username');
            $valid=$uid>0 ? true : false;
            echo json_encode(array(
                'valid' => $valid,
            ));  
        } else {
            $this->error('非法访问！');
        }
    }
    

    
    //退出登录
    public function logout() {
        
        //清除自动登录的cookie
        cookie('username', null);
        //跳转到正确跳转页
        $this->success('退出成功！', U('Index/index'));
    }

    

    //上传头像
    public function upload(){
        $Upload=new Upload();
        $Upload->rootPath=C('UPLOAD_PATH');
        $info=$Upload->upload();
        if ($info) {
            $imgPath=$info['Filedata']['url'];
            echo $imgPath;
        }else{
            $this->ajaxReturn($Upload->getError());
        }

        

    }



    
}