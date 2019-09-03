<?php
namespace app\index\controller;
use Think\Controller;
class User extends Controller
{
    public function user()
    {
        $keywords=input('keywords');
        if($keywords){
            $map['title']=['like','%'.$keywords.'%'];
            $searchres=db('article')->where($map)->order('id desc')->paginate($listRows = 3, $simple = false, $config = [
                'query'=>array('keywords'=>$keywords),
            ]);
            $this->assign(array(
                'searchres'=>$searchres,
                'keywords'=>$keywords
            ));
        }else{
            $this->assign(array(
                'searchres'=>null,
                'keywords'=>'暂无数据'
            ));
        }

        return $this->fetch('search');
    }
}
