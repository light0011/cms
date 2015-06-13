<?php
namespace Home\Controller;
use Think\Controller;

class ChapterController extends Controller {
    
    // public function index(){
    //     $Chapter=D('Chapter');
    //     $this->assign('oneChapter',$Nav->getOneChapter(I('get.id')));
    //     $this->display();
    // }

    public function oneChapter(){

        $Nav=D('Nav');
        $Chapter=D('Chapter');
        $Comment=D('Comment');
        $this->assign('frontTenNav',$Nav->getFrontTenNav());
        $this->assign('oneChapter',$Chapter->getOneChapter(I('get.id')));
        //文章详情页面本类推荐
        $this->assign('chapterRecommend',$Chapter->getChapterRecommend(I('get.id')));
        //文章详情页面本类热点
        $this->assign('chapterHot',$Chapter->getChapterHot(I('get.id')));
        //获取文章页面下面三条最新评论
        $this->assign('newThreeComment',$Comment->getNewThreeComment(I('get.id')));
        //获取评论总数
        $this->assign('chapterCommentCount',$Comment->getChapterCommentCount(I('get.id')));
        if (cookie('username')) {
            $this->assign('userValue',1);
        }else{
            $this->assign('userValue',0);
        }
        $this->display();

    }

    public function searchChapter(){
        $Nav=D('Nav');
        $Chapter=D('Chapter');
        $this->assign('frontTenNav',$Nav->getFrontTenNav());
        $this->assign('searchChapter',$Chapter->searchChapter(I('post.type'),I('post.content')));
        $this->display();
    }

    public function searchTag(){
        $Nav=D('Nav');
        $Chapter=D('Chapter');
        $this->assign('frontTenNav',$Nav->getFrontTenNav());
        $this->assign('searchChapter',$Chapter->searchTagChapter(I('get.tag')));
        $this->display('searchChapter');
    }

    

}