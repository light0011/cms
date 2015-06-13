<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Upload;


class AdController extends Controller {

    

    public function index(){

        $Ad=D('Ad');
        $this->assign('list',$Ad->show());
        $this->display();
    }

    public function update(){
        $Ad=D('Ad');
        $oneAd=$Ad->findOne(I('get.id'));
        if ($oneAd) {
            $this->assign('oneAd',$oneAd);
            $this->display();
        }else{
            $this->error('操作失败');
        }
        
    }
    

    public function updateAfter(){
        $Ad=D('Ad');
        $rid=$Ad->updateAd(I('id'),I('title'),I('content'),I('url'));
        if ($rid>0) {
            $this->success('修改轮播器成功',U('Ad/index'));
        }else{
            $this->error('修改轮播器失败');
        }
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