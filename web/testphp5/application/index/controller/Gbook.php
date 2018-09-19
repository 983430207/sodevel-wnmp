<?php

namespace app\index\controller;

class Gbook extends \think\Controller{

    public function index(){
        $gbook = new \app\index\model\Gbook();
        $rows = $gbook->order('id','desc')->paginate(1);

        $this->assign('rows',$rows);
        return view();
    }
    public function save(){
        $content = $this->request->post('content');
        $username = $this->request->post('username');

        $gbook = new \app\index\model\Gbook();

        $gbook->save([
            'content'   => $content,
            'username'  => $username,
            'create_time'   => time(),
        ]);

        return $this->success('留言成功，现在返回首页', 'index/gbook/index');
    }
}