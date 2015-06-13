<?php

namespace Admin\Model;

use Think\Model;

use Think\Page;



class ManagerModel extends Model{

    private $pageNum=10;

    //管理员帐号自动验证
    protected $_validate = array(
        //-1,'帐号长度不合法！'
        array('manager', '/^[^@]{2,20}$/i', -1, self::EXISTS_VALIDATE),
        //-2,'密码长度不合法！'
        array('password', '6,30', -2, self::EXISTS_VALIDATE,'length'),
    );
    


    public function checkManager($manager,$password){
        $data=$map=$update=array();
        $data['manager']=$manager;
        $data['password']=$password;

        if ($this->create($data)) {
            $map['manager']=$manager;
            $map['password']=sha1($password);
            $obj=$this->field('id,manager')->where($map)->find();
            if ($obj) {
                $update['id']=$obj['id'];
                $update['last_login']=time();
                $update['last_ip']=get_client_ip(1);
                $this->save($update);
                session('admin',$obj['manager']);
                session('id',$obj['id']);
                return $obj['id'];
            }else{
                return 0;
            }
        }else{
            return $this->getError();
        }

    }

    public function  show(){
        $num=$this->pageNum;
        $p=$_GET['p'] ? $_GET['p'] : 1;
        $page=($p-1)*$num;
        $obj=$this
                        ->join('cms_auth_group_access on cms_manager.id=cms_auth_group_access.uid ')
                        ->join('cms_auth_group on cms_auth_group_access.group_id=cms_auth_group.id')
                        ->field('cms_manager.id,cms_manager.manager,cms_manager.last_login,cms_manager.last_ip,cms_auth_group.title')->limit($page.",$this->pageNum")->select();
        foreach ($obj as $key => $value) {
            $obj[$key]['last_login']=date('Y-m-d H:i:s',$obj[$key]['last_login']);

        }
        return $obj;

  
    }

    public function page(){
        $count = $this->count();// 查询满足要求的总记录数
        $Page= new Page($count,$this->pageNum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show= $Page->show();// 分页显示输出
        return $show;
    }


    public function addManager($manager,$password){
        $data=array();
        $data['manager']=$manager;
        $data['password']=sha1($password);
        $data['last_login']=time();
        $data['last_ip']=get_client_ip(1);
        return $this->add($data);
        
    }

    public function deleteManager($id){
        return $this->delete($id);
    }

}