<?php
namespace Admin\Controller;
use Think\Upload;
use Think\Image;
use Think\Controller;

class ChapterController extends Controller {

    

    public function index(){
        $Chapter=D('Chapter');
        $this->assign('list',$Chapter->show());
        $this->assign('page',$Chapter->page());
        $this->display();
    }

   
    
    public function addChapter(){
        $Nav=D('Nav');
        $this->assign('nav',$Nav->findAll());
        $this->display();
    }
    

    public function addChapterAfter(){
        $Chapter=D('Chapter');
        $rid=$Chapter->addChapter(I('name'),I('nav'),I('attr'),I('tag'),I('keyword'),I('thumb'),I('source'),I('author'),I('info'),I('content'),I('commend'),I('read_count'),I('sort'),I('gold'),I('limit'),I('color'));
        if ($rid>0) {
            $this->success('增加文档成功');
        }else{
            $this->error('增加文档失败');
        }
    }

    public function update(){
        $Chapter=D('Chapter');
        $Nav=D('Nav');
        $this->assign('nav',$Nav->findAll());
        $oneChapter=$Chapter->findOne(I('get.id'));
        $this->assign('oneChapter',$oneChapter);
        $this->display();
    }
    

    public function updateChapterAfter(){
        $Chapter=D('Chapter');
        $rid=$Chapter->updateChapter(I('id'),I('name'),I('nav'),I('attr'),I('tag'),I('keyword'),I('thumb'),I('source'),I('author'),I('info'),I('content'),I('commend'),I('read_count'),I('sort'),I('gold'),I('limit'),I('color'));
        if ($rid>0) {
            $this->success('修改文档成功',U('Chapter/index'));
        }else{
            $this->error('修改文档失败');
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

    public function delete(){
        $Chapter=D('Chapter');
        $rid=$Chapter->deleteChapter(I('get.id'));
        if ($rid) {
            $this->success('删除文档成功',U('Chapter/index'));
        }else{
            $this->error('删除文档失败');
        }
    }



}