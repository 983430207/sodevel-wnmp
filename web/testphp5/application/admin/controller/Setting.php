<?php
namespace app\admin\controller;

class Setting extends Base
{

    function initialize(){
        parent::initialize();
        $this->setting = new \app\common\model\Setting();
    }

    public function index()
    {

        $data = [
            'setting'   => $this->setting->select(),
        ];
        return view(null, $data);
    }

    /**
     * 保存配置
     * @return [type] [description]
     */
    public function save()
    {
        $r = [];
        $r['formdata'] = $this->request->post('formdata');
        $r['__token__'] = $this->request->post('__token__');

        //数据格式验证
        $validate = new \app\common\validate\Setting();
        if( !$validate->check($r) ){
            return $this->error($validate->getError());
        }

        //批量修改数据
        $list = [];

        foreach( $this->setting->select() as $item ){
            $list[] = [
                'id'    => $item->id,
                'value' => $r['formdata'][ $item->key ],
            ];
        }        

        $is = $this->setting->saveAll( $list );
        //删除缓存，下次会重新生成
        \think\facade\Cache::rm('setting');
        
        return $this->success("修改成功",'admin/setting/index');
    }
}

