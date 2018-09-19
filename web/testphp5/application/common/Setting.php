<?php

namespace app\common;

class Setting{

    protected $data = false;

    /**
     * 从数据库中取配置，只取一次，不会重复执行查询
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function get($key){

        //如果类属性是false，说明第一次调用get
        if( $this->data === false ){
            
            //从缓存中取数据
            $list = \think\facade\Cache::get('setting');

            //没有缓存，只能查数据库
            if( $list === false ){
                $setting = new \app\common\model\Setting();
                $list = [];
                $setting->select()->each(function( $item, $k )use(&$list){
                    $list[ $item->key ] = $item;
                });

                //将查库结果写入缓存
                \think\facade\Cache::set('setting', $list);                
            }

            //将数据赋值给类属性
            $this->data = $list;
        }

        return isset($this->data[$key]) ? $this->data[$key]->value : null;
    }
}
