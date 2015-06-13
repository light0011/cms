<?php

namespace Home\Model;

use Think\Model;

class VoteModel extends Model{

    public function getVote(){
        $voteTitle=$this->field('id,title')->where("pid=0 AND state=1")->find();
      
        $pid=$voteTitle['id'];
        $voteItem=$this->field('id,title,count')->where("pid=$pid")->select();

        $num=$this->where("pid=$pid")->sum('count');
        foreach ($voteItem as $key => $value) {
            $voteItem[$key]['percent']=round($value['count']/$num*100,2).'%';
        }
        $vote['title']=$voteTitle;
        $vote['item']=$voteItem;
        return $vote;
    }

    public function vote($id){
        $id=(int)$id;
        if (cookie('ip')==get_client_ip(1)) {
            if (time()-cookie('time')<86400) {
                return -1;
            }
        }
        $vote=$this->field('id,count')->where("id=$id")->find();
        $data['id']=$id;
        $data['count']=$vote['count']+1;
        cookie('ip',get_client_ip(1));
        cookie('time',time());
        return $this->save($data);
    }
    


}