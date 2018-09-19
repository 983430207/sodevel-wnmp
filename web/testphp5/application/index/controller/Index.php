<?php
namespace app\index\controller;

use app\common\model\Content as C;
//use think\Db;

class Index extends Base
{
    public function index( \think\Request $request )
    {   

        $newData = C::where('content_status',1)
                    ->order('id','desc')
                    ->limit(10)
                    ->paginate(10);
        
        $data = [
            'newData'   => $newData,
        ];
        return view(null,$data);
    }

    public function read( \think\Request $request, $id ){

        $blogitem = C::where('id',$id)->where('content_status',1)->find();
        if(!$blogitem){
            return $this->error('数据不存在');
        }

        $data = [
            'blogitem'  => $blogitem
        ];
        return view(null,$data);
    }
}
