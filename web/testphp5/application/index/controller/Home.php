<?php
namespace app\index\controller;

use app\common\model\Content as C;
use app\common\model\User as U;
//use think\Db;

class Home extends Base
{
    public function index( \think\Request $request, $id )
    {   
        
        $u = new U();
        $homeUser = $u->getUser( $id );
        if( !$homeUser ){
            return $this->error('不存在的用户。');
        }
        

        $newData = C::where('content_status',1)
                    ->where('user_id', $id)
                    ->order('id','desc')
                    ->limit(10)
                    ->paginate(10);
        
        $data = [
            'newData'   => $newData,
            'homeUser'      => $homeUser
        ];
        return view(null,$data);
    }
}
