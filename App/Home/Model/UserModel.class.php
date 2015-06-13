<?php
namespace Home\Model;
use Think\Model\RelationModel;

class UserModel extends RelationModel {
    
    //批量验证
    //protected $patchValidate = true;
    
    //用户表自动验证
    protected $_validate = array(
        //-1,'帐号长度不合法！'
        array('username', '2,20', -1, self::EXISTS_VALIDATE,'length'),
        //-2,'密码长度不合法！'
        array('password', '6,30', -2, self::EXISTS_VALIDATE,'length'),
        //-3,'密码和密码确认不一致！'
        array('repassword', 'password', -3, self::EXISTS_VALIDATE,'confirm'),
        //-4,'邮箱格式不正确！'
        array('email', 'email', -4, self::EXISTS_VALIDATE),
    
        //-5,'帐号被占用！'
        array('username', '', -5, self::EXISTS_VALIDATE, 'unique', self::MODEL_INSERT),

        //-8,登录用户名长度不合法
        array('login_username', '6,30', -8, self::EXISTS_VALIDATE,'length'),
    );
    
    //用户表自动完成
    protected $_auto = array(
        array('password', 'sha1', self::MODEL_BOTH, 'function'),
    );
    
    //一对一关联用户
    protected $_link = array(
        'extend'=>array(
            'mapping_type'=>self::HAS_ONE,
            'class_name'=>'UserExtend',
            'foreign_key'=>'uid',
            'mapping_fields'=>'intro',      
        ),
    );
    
    //验证占用字段
    public function checkField($field, $type) {
        $data = array();
        switch ($type) {
            case 'username' : 
                $data['username'] = $field;
                break;
            case 'verify' : 
                $data['verify'] = $field;
                break;
            default:
                return 0;
        }
        return $this->create($data) ? 1 : $this->getError();
    }
    
    //注册一条用户
    public function register($username, $password, $repassword,$face) {
        if (empty($face)) {
            $face='http://cmsli-image.stor.sinaapp.com/00.gif';
        }
        $data = array(
            'username'=>$username,
            'password'=>$password,
            'repassword'=>$repassword,
            'face'=>$face,
            'last_login'=>time(),
        );
        
        if ($this->create($data)) {
            $uid = $this->add();
            cookie('username',$username);

            return $uid ? $uid : 0;
        } else {
            return $this->getError();
        }
    }

    public function getLoginUser(){
        $map['username']=cookie('username');
        return $this->field('username,face')->where($map)->find();
    }
    
    //登录用户
    public function login($username, $password, $auto) {
        //where条件
        $map = array();
        $map['username'] = $username;
        //验证密码
        $user = $this->field('id,username,password,face')->where($map)->find();
        if ($user['password'] == sha1($password)) {
            
            //登录验证后写入登录信息
            $update = array(
                'id'=>$user['id'],
                'last_login'=>time(),
            );
            $this->save($update);
            //将用户名加密写入cookie
            if ($auto == 'on') {
                cookie('username', $user['username'], 3600 * 24 * 30);
            }
            
            return $user['id'];
        } else {
            return -9;      //密码不正确
        }
    }

    public function getFrontSixUser(){
        return $this->field('username,face')->order('last_login DESC')->limit('0,6')->select();
    }
    
    
    
}