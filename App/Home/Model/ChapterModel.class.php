<?php

namespace Home\Model;

use Think\Model;

use Think\Page;

class ChapterModel extends Model{

    private $pageNum=10;
    

    public function page($navId){
        $navId=(int)$navId;
        $resultNav=$this->getIds($navId);
        $count= $this->table('__CHAPTER__ a,__NAV__ b')->field('a.id,a.name,a.info,a.thumb,b.name as navName')-> where("a.nav=b.id AND b.id in($resultNav)")->count();
        $Page= new Page($count,$this->pageNum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show= $Page->show();// 分页显示输出
        return $show;
    }

    public function  getNewestSeven(){
        $newestSeven=$this->field('id,name,date')->order('date DESC')->limit('0,7')->select();
        return $this->setFormat($newestSeven);
    }

    public function getListNewsTitle($navId){
        $num=$this->pageNum;
        $p=$_GET['p'] ? $_GET['p'] : 1;
        $page=($p-1)*$num;
        $navId=(int)$navId;
        $resultNav=$this->getIds($navId);
        $listNewsTitle= $this->table('__CHAPTER__ a,__NAV__ b')->field('a.id,a.name,a.info,a.thumb,b.name as navName')-> where("a.nav=b.id AND b.id in($resultNav)")->limit($page.",$this->pageNum")->select();
        foreach ($listNewsTitle as $key => $value) {
            if (mb_strlen($listNewsTitle[$key]['info'],'utf-8')>100) {
                $listNewsTitle[$key]['info']=mb_substr($listNewsTitle[$key]['info'], 0,100,'utf-8').'。。。';
            }   
        }
        return $listNewsTitle;
    }


    private function getIds($navId){
        $navId=(int)$navId;
        $Nav=D('Nav');
        $childNav=$Nav->field('id')->where("pid=$navId")->select();
        if (count($childNav)>0) {
            foreach ($childNav as $key => $value) {
                $ids.=$value['id'].',';
            }
            $ids=substr($ids,0,-1);
        }else{
            $ids=$navId;
        }

        return $ids;
    }

    public function getOneChapter($id){
        $id=(int)$id;
        $oneChapter=$this->field('id,name,nav,keyword,tag,attr,author,info,content,thumb,color,read_count,limit,source,commend,date')->where("id=$id")->find();
        $oneChapter['content']=htmlspecialchars_decode($oneChapter['content']);
        $oneChapter['date']=date('Y-m-d H:i:s',$oneChapter['date']);
        $oneChapter['tag']=explode('|',$oneChapter['tag']);
        //获取文章页面导航页
        $Nav=D('Nav');
        $oneChapter['twoNav']=$Nav->getChapterOne($oneChapter['nav']);
        $oneChapter['oneNav']=$Nav->getChapterOne($oneChapter['twoNav']['pid']);
        //获取评论
        
        //阅读量增加一
        $data['id']=$oneChapter['id'];
        $data['read_count']=$oneChapter['read_count']+1;
        $this->save($data);
        return $oneChapter;
    }

    public function getCommentChapter($cid){
        $cid=(int)$cid;
        return $this->field('id,name')->where("id=$cid")->find();
    }

    public function getHotTwentyChapter(){
        $hotTwentyChapter=$this->query("SELECT ch.id,ch.name,ch.date FROM __CHAPTER__ ch  ORDER BY(SELECT COUNT(*) FROM __COMMENT__ co WHERE co.cid=ch.id ) DESC LIMIT 0,20 ");
        return $this->setFormat($hotTwentyChapter);

    }


    //首页特别推荐
    public function getRecommendChapter(){
        $map['attr'] = array('like','%推荐%');
        $chapters=$this->field('id,name,date')->where($map)->order("date DESC")->limit('0,7')->select();
        return $this->setFormat($chapters);
    }


    //首页本月热点
    public function getHotChapter(){
        $y=date("Y",time());
        $m=date("m",time());
        $d=date("d",time());
        $t0=date('t'); // 本月一共有几天
        $t1=mktime(0,0,0,$m,1,$y); // 创建本月开始时间 
        $t2=mktime(23,59,59,$m,$t0,$y); // 创建本月结束时间

        $map['date']=array('between',"$t1,$t2");
        $chapters=$this->field('id,name,date')->where($map)->order('read_count DESC')->limit('0,4')->select();
        return $this->setFormat($chapters);
    }


    //设置名称，日期格式
    private function setFormat($chapters){

        foreach ($chapters as $key => $value) {
            $chapters[$key]['sub_name']=mb_substr($chapters[$key]['name'],0,15,'utf-8');
            $chapters[$key]['date']=date('Y-m-d',$chapters[$key]['date']);
        }
        return $chapters;
    }
    
    //首页四个栏目的九条标题
    public function getFourNavChapter(){
        $Nav=D('Nav');
        $mainNavs=$Nav->getFourNav();
        foreach ($mainNavs as $key => $value) {
            $child='';
            $childNavs=$Nav->getChildNav($value['id']);
            foreach ($childNavs as $k => $v) {
                $child.=$v['id'].',';
            }
            $child=substr($child,0,-1);
            $chapters=$this->field('id,name,date')->where("nav in ($child)")->order('date DESC')->limit('0,9')->select();

            $mainNavs[$key]['child']=$this->setFormat($chapters);
          
        }
        return $mainNavs;
    }

    //首页本月评论
    public function getIndexCommentChapter(){
        $commentChapter=$this->query("SELECT ch.id,ch.name,ch.date FROM __CHAPTER__ ch  ORDER BY(SELECT COUNT(*) FROM __COMMENT__ co WHERE co.cid=ch.id ) DESC LIMIT 0,4 ");
        return $this->setFormat($commentChapter);
    }
    

    //列表页本类推荐
    public function getListRecommendChapter($navs){
        $navChapter='';
        foreach ($navs['child'] as $key => $value) {
            $navChapter.=$value['id'].',';
        }
        $navChapter=substr($navChapter, 0,-1);
        $map['attr'] = array('like','%推荐%');
        $map['nav']=array('in',"$navChapter");
        $chapters=$this->field('id,name,date')->where($map)->order("date DESC")->limit('0,4')->select();
        return $this->setFormat($chapters);
    }


    //列表页本类热点
    public function getListHotChapter($navs){
        $navChapter='';
        foreach ($navs['child'] as $key => $value) {
            $navChapter.=$value['id'].',';
        }
        $navChapter=substr($navChapter, 0,-1);
        $map['nav']=array('in',"$navChapter");
        $chapters=$this->field('id,name,date')->where($map)->order("read_count DESC")->limit('0,4')->select();
        return $this->setFormat($chapters);
    }

    //搜索内容
    public function searchChapter($type,$content){

        if ($type=='1') {
            $listNewsTitle= $this->table('__CHAPTER__ a,__NAV__ b')->field('a.id,a.name,a.info,a.thumb,b.name as navName')-> where("a.nav=b.id AND a.name like '%$content%' ")->order('date DESC')->select();
            foreach ($listNewsTitle as $key => $value) {
                if (mb_strlen($listNewsTitle[$key]['info'],'utf-8')>100) {
                    $listNewsTitle[$key]['info']=mb_substr($listNewsTitle[$key]['info'], 0,100,'utf-8').'。。。';
                }   
            }
            return $listNewsTitle;
        }elseif($type=='2'){
            $listNewsTitle= $this->table('__CHAPTER__ a,__NAV__ b')->field('a.id,a.name,a.info,a.thumb,b.name as navName')-> where("a.nav=b.id AND a.keyword like '%$content%' ")->order('date DESC')->select();
            foreach ($listNewsTitle as $key => $value) {
                if (mb_strlen($listNewsTitle[$key]['info'],'utf-8')>100) {
                    $listNewsTitle[$key]['info']=mb_substr($listNewsTitle[$key]['info'], 0,100,'utf-8').'。。。';
                }   
            }
            return $listNewsTitle;
        }
       
    }   

    //标签搜索
    public function searchTagChapter($tag){
        $Tag=M('Tag');
        $map['name']=$tag;
        $searchTag=$Tag->field('id,count')->where($map)->find();
        if (!$searchTag) {
            $data['name']=$tag;
            $Tag->add($data);
        }else{
            $update['id']=$searchTag['id'];
            $update['count']=$searchTag['count']+1;
            $Tag->save($update);
        }
        $listNewsTitle= $this->table('__CHAPTER__ a,__NAV__ b')->field('a.id,a.name,a.info,a.thumb,b.name as navName')-> where("a.nav=b.id AND a.tag like '%$tag%' ")->order('date DESC')->select();
        foreach ($listNewsTitle as $key => $value) {
            if (mb_strlen($listNewsTitle[$key]['info'],'utf-8')>100) {
                $listNewsTitle[$key]['info']=mb_substr($listNewsTitle[$key]['info'], 0,100,'utf-8').'。。。';
            }   
        }
        return $listNewsTitle;
    }

    //文章页面本类推荐
    public function getChapterRecommend($id){
        $id=(int)$id;
        $chapter=$this->field('nav')->where("id=$id")->find();
        if ($chapter) {
            $id=$chapter['nav'];
            $Nav=D('Nav');
            $MainNav=$Nav->field('pid')->where("id=$id")->find();
            if ($mainNav) {
                $pid=$MainNav['pid'];
                $childNav=$Nav->field('id')->where("pid=$pid")->select();
                if ($childNav) {
                    foreach ($childNav as $key => $value) {
                        $navChapter.=$value['id'].',';
                    }
                    $navChapter=substr($navChapter, 0,-1);
                    $map['attr'] = array('like','%推荐%');
                    $map['nav']=array('in',"$navChapter");
                    $chapters=$this->field('id,name,date')->where($map)->order("date DESC")->limit('0,4')->select();
                    if ($chapters) {
                        return $this->setFormat($chapters);
                    }
                  
                }
                
            }
            
        }
        
    }

    //文章页面本类热点
    public function getChapterHot($id){
        $id=(int)$id;
        $chapter=$this->field('nav')->where("id=$id")->find();
        if ($chapter) {
            $id=$chapter['nav'];
            $Nav=D('Nav');
            $MainNav=$Nav->field('pid')->where("id=$id")->find();
            if ($MainNav) {
                $pid=$MainNav['pid'];
                $childNav=$Nav->field('id')->where("pid=$pid")->select();
                if ($childNav) {
                   foreach ($childNav as $key => $value) {
                        $navChapter.=$value['id'].',';
                    }
                    $navChapter=substr($navChapter, 0,-1);
                    $map['nav']=array('in',"$navChapter");
                    $chapters=$this->field('id,name,date')->where($map)->order("read_count DESC")->limit('0,4')->select();
                    return $this->setFormat($chapters);
                }
                
            }
        }
        
        
    }




}