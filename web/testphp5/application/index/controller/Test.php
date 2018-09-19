<?php

namespace app\index\controller;

class Test extends \think\Controller{

    public function index(){

        $url = 'http://news.163.com/18/0718/08/DMVVKGLB0001899N.html';
        $url = '';
        $url = 'http://news.163.com/18/0718/11/DN0C7GTS0001875N.html';
        $url = 'http://news.163.com/18/0718/07/DMVSPF1T0001875N.html';
        $url = 'http://news.163.com/18/0718/09/DN0370RU00018AOP.html';
        $html = file_get_contents($url);
        $html = iconv("gbk","utf-8",$html);

        $is = preg_match("/<h1>(.*?)<\/h1>/i", $html, $title);
        if(!$is){
            die('标题获取失败');
        }
        $title = $title[1];

        $is = preg_match('/<div class="post_text".*?>(.*?)<\/div>/is', $html, $content);
        if(!$is){
            die('内容获取失败');
        }
        $content = strip_tags($content[1],"<p>,<img>");


        $c = new \app\common\model\Content();
        $r = [
            'id'    => 0,
            'title'  => $title,
            'content'  => $content,
            'content_status'  => 1,
            'user_id' => 6
        ];
        var_dump($r);
        $c->storage( $r, 6 );

        //return view('test/index2', $data);
    }
}