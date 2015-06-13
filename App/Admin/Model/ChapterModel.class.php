<?php

namespace Admin\Model;

use Think\Model;

use Think\Page;

class ChapterModel extends Model{

    private $pageNum=10;
    

    public function page(){
        $count = $this->count();// 查询满足要求的总记录数
        $Page= new Page($count,$this->pageNum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show= $Page->show();// 分页显示输出
        return $show;
    }

   
    public function  show(){
        $num=$this->pageNum;
        $p=$_GET['p'] ? $_GET['p'] : 1;
        $page=($p-1)*$num;
        $chapter=$this->table('__CHAPTER__ a,__NAV__ b')->field('a.id,a.name,a.keyword,a.date,b.name as navname')->where('a.nav=b.id')->order('date DESC')->limit($page.",$this->pageNum")->select();
        foreach ($chapter as $key => $value) {
            $chapter[$key]['date']=date('Y-m-d H:i:s',$chapter[$key]['date']);
        }
        return $chapter;
    }

    
    public function addChapter($name,$nav,$attr,$tag,$keyword,$thumb,$source,$author,$info,$content,$commend,$read_count,$sort,$gold,$limit,$color){
        $data=array();
        $data['name']=$name;
        $data['nav']=$nav;
        $data['tag']=$tag;
        $data['keyword']=$keyword;
        $data['thumb']=$thumb;
        $data['source']=$source;
        $data['author']=$author;
        $data['info']=$info;
        $data['content']=$content;
        $data['commend']=$commend;
        $data['read_count']=$read_count;
        $data['sort']=$sort;
        $data['gold']=$gold;
        $data['limit']=$limit;
        $data['color']=$color;
        $data['date']=time();

        if(is_array($attr)){
            $data['attr']=implode('|', $attr);
        }
        return $this->add($data);
    }

    public function findOne($id){
        $map['id']=$id;
        $oneChapter= $this->field('id,name,nav,attr,tag,keyword,thumb,source,author,info,content,commend,read_count,sort,gold,limit,color')->where($map)->find();
        $oneChapter['content']=htmlspecialchars_decode($oneChapter['content']);
        return $oneChapter;
    }

    public function updateChapter($id,$name,$nav,$attr,$tag,$keyword,$thumb,$source,$author,$info,$content,$commend,$read_count,$sort,$gold,$limit,$color){
        $data=array();
        $data['id']=$id;
        $data['name']=$name;
        $data['nav']=$nav;
        $data['tag']=$tag;
        $data['keyword']=$keyword;
        $data['thumb']=$thumb;
        $data['source']=$source;
        $data['author']=$author;
        $data['info']=$info;
        $data['content']=$content;
        $data['commend']=$commend;
        $data['read_count']=$read_count;
        $data['sort']=$sort;
        $data['gold']=$gold;
        $data['limit']=$limit;
        $data['color']=$color;


        if(is_array($attr)){
            $data['attr']=implode('|', $attr);
        }
        return $this->save($data);
    }

    public function deleteChapter($id){
        return $this->delete($id);
    }
    
    



}