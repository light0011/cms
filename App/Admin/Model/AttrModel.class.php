<?php

namespace Admin\Model;

use Think\Model;

class AttrModel extends Model{

    protected $_validate = array(
        //-1,'属性长度不合法！'
        array('name', '2,20', -1, self::EXISTS_VALIDATE,'length'),
        //-2,'简介长度不合法！'
        array('info', '6,30', -2, self::EXISTS_VALIDATE,'length'),
    );
    


    public function getAttr($page,$rows,$search_attr){
        $map='';
        if ($search_attr) {
            $map['name']=array('like','%'.$search_attr.'%');
        }
        $obj= $this->field('id,name,info,sort')
                        ->where($map)
                        ->limit(($page-1)*$rows,$rows)
                        ->select();
        return array(
            'rows'=>$obj,
            'total'=>$this->where($map)->count()
        );
    }

    public function removeAttr($ids){
        return  $this->delete($ids);
    }

    public function addAttr($attr,$info){
        $data['name']=$attr;
        $data['info']=$info;
        if ($this->create($data)) {
            $aid=$this->add($data);
            return $aid;
        }else{
            return $this->getError();
        }
        
    }


}