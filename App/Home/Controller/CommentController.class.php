<?php
namespace Home\Controller;
use Think\Controller;

class CommentController extends Controller {
    
    
    public function addComment(){
        if (IS_AJAX) {
            $Comment = D('Comment');
            $uid = $Comment->addComment(I('post.cid'), I('post.content'), I('post.manner'));
            echo $uid;
        } else {
            $this->error('非法访问！');
        }

    }

    public function setManner(){
        if (IS_AJAX) {
            $Comment = D('Comment');
            $uid = $Comment->setManner(I('post.id'), I('post.type'));
            echo $uid;
        } else {
            $this->error('非法访问！');
        }
    }

    public function index(){
        $Comment=D('Comment');
        $Nav=D('Nav');
        $Chapter=D('Chapter');
        $this->assign('page',$Comment->page(I('get.cid')));
        $this->assign('chapterCommentCount',$Comment->getChapterCommentCount(I('get.cid')));
        $this->assign('frontTenNav',$Nav->getFrontTenNav());
        $this->assign('commentChapter',$Chapter->getCommentChapter(I('get.cid')));
        $this->assign('chapterComment',$Comment->getChapterComment(I('get.cid')));
        $this->assign('hotThreeComment',$Comment->getHotThreeComment(I('get.cid')));
        $this->assign('hotTwentyChapter',$Chapter->getHotTwentyChapter());
        $this->display();
    }


}