<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller {
    
    public function index(){
        $Nav=D('Nav');
        $User=D('User');
        $Chapter=D('Chapter');
        $Vote=D('Vote');
        $Ad=D('Ad');
        $Tag=M('Tag');
        //标签
        $tags=$Tag->field('id,name,count')->order('count DESC')->limit('0,7')->select();
        $this->assign('tags',$tags);
        //最新讯息
        $this->assign('newestSeven',$Chapter->getNewestSeven());
        //十个导航
        $this->assign('frontTenNav',$Nav->getFrontTenNav());
        //最近登录的六个用户
        $this->assign('frontSixUser',$User->getFrontSixUser());
        //特别推荐
        $this->assign('recommendChapter',$Chapter->getRecommendChapter());
        //本月热点
        $this->assign('hotChapter',$Chapter->getHotChapter());
        //本月评论
        $this->assign('commentChapter',$Chapter->getIndexCommentChapter());
        //首页四个栏目的九条最新消息
        $this->assign('fourNavChapter',$Chapter->getFourNavChapter());
        //投票
        $this->assign('vote',$Vote->getVote());
        //轮播器
        $this->assign('ad',$Ad->getAll());
        //根据用户是否登录显示不同页面
        if (cookie('username')) {
            $this->assign('frontUser',$User->getLoginUser());
            $this->assign('userValue',1);
        }else{
            $this->assign('userValue',0);
        }
        $this->display();
    }

    

}