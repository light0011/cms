<?php
namespace Home\Controller;
use Think\Controller;

class ListController extends Controller {
    
    public function index(){
        $Nav=D('Nav');
        $Chapter=D('Chapter');
        $Tag=M('Tag');
        $tags=$Tag->field('id,name,count')->order('count DESC')->limit('0,7')->select();
        $this->assign('tags',$tags);
        $this->assign('frontTenNav',$Nav->getFrontTenNav());
        //得到列表页的nav
        $navs=$Nav->getFrontNav(I('get.id'));
        $this->assign('frontNav',$navs);
        //本类推荐
        $this->assign('recommendChapter',$Chapter->getListRecommendChapter($navs));
        //本月热点
        $this->assign('hotChapter',$Chapter->getListHotChapter($navs));
        $this->assign('listNewsTitle',$Chapter->getListNewsTitle(I('get.id')));
        $this->assign('page',$Chapter->page(I('get.id')));
        $this->display();
    }




}