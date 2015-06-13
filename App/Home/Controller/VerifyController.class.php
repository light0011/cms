<?php


namespace Home\Controller;
use Think\Controller;
use Think\Verify;




class VerifyController extends Controller {
    
    

    //Ajax验证数据，验证码返回给Ajax
    public function checkVerify1() {
        if (IS_AJAX) {
            $uid=$this->check_verify(I('post.verify'),1);
            $valid=$uid>0 ? true : false;
            echo json_encode(array(
                'valid' => $valid,
            ));
        } else {
            $this->error('非法访问！');
        }
    }
    public function checkVerify2() {
        if (IS_AJAX) {
            $uid=$this->check_verify(I('post.verify'),2);
            $valid=$uid>0 ? true : false;
            echo json_encode(array(
                'valid' => $valid,
            ));
        } else {
            $this->error('非法访问！');
        }
    }
    public function checkVerify3() {
        if (IS_AJAX) {
            $uid=$this->check_verify(I('post.verify'),3);
            $valid=$uid>0 ? true : false;
            echo json_encode(array(
                'valid' => $valid,
            ));
        } else {
            $this->error('非法访问！');
        }
    }

    //登录
    public function verify1() {
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify = new Verify($config);
        $Verify->entry(1);
    }

    //注册
    public function verify2() {
        $Verify = new Verify();
        $Verify->entry(2);
    }
 

    //发表评论
    public function verify3() {
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    3,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify = new Verify($config);
        $Verify->entry(1);
    }

    function check_verify($code, $id = 1) {
            $Verify = new \Think\Verify();
            $Verify->reset = false;
            return $Verify->check($code, $id);
    }






    
}