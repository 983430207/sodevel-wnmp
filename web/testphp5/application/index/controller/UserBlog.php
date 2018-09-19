<?php
namespace app\index\controller;
use app\common\model\Content as C;

//use think\Db;

class UserBlog extends UserBase
{

    public function initialize(){
        parent::initialize();
        $this->content_status = config('project.content_status');
        $this->assign( 'content_status', $this->content_status );
    }

    public function index( \think\Request $request )
    {
        $key = trim($this->request->get('key'));

        $c = C::with('adminUser,user');

        //搜索条件
        if( $key ){
            $c = $c->where('title','like',"%{$key}%");
        }

        $cData = $c->my($this->user->id)->order('id','desc')->paginate(10);

        $data = [
            'cData'    => $cData,
            'key'       => $key,
        ];
        return view(null, $data);
    }
    public function add( \think\Request $request )
    {
        return view();
    }
    public function modify( \think\Request $request )
    {
        $id = $this->request->get('id');

        $c = new C();
        $item = $c->my($this->user->id)->where('id',$id)->find();
        if(!$item){
            return $this->error('数据不存在');
        }

        $data = [
            'typeName'  => '修改',
            'item'  => $item,
        ];
        return view('user_blog/add',$data);
    }
    public function save( \think\Request $request )
    {
            $r = ['id'  => $this->request->post('id'),
            'title'  => $this->request->post('title'),
            'content'  => $this->request->post('content'),
            'content_status'  => (int)$this->request->post('content_status'),
            '__token__'  => $this->request->post('__token__'),
            'user_id' => $this->user->id
        ];

        //插入数据
        $c = new C();
        try{
            $c->storage( $r, $this->user->id );
        }catch(\Exception $e){
            return $this->error( $e->getMessage() );
        }

        return $this->redirect('index/userblog/index');
    }

    /**
     * 状态管理
     * @return [type] [description]
     */
    public function status()
    {
        $status = (int)$this->request->get('status');
        $id = (int)$this->request->get('id');
        if( $id<1 ){
            return $this->error('数据无效');
        }

        $new_status = $status == 1 ? 0 : 1;
        $item = C::my($this->user->id)->where('id',$id)->find();
        if( !$item ){
            return $this->error('数据无效');
        }
        $item->save([
            'content_status'   => $new_status
        ]);


        return $this->success("操作成功");
    }

    /**
     * 删除数据
     * @return [type] [description]
     */
    public function del()
    {
        $id = $this->request->get('id');

        $c = new C();
        try{
            $c->remove( $id, $this->user->id );
        }catch(\Exception $e){
            return $this->error( $e->getMessage() );
        }
        return $this->success("操作成功");
    }

    //处理上传
    public function up(){
        $file = $this->request->file('file1');
        $info = $file->validate(['size'=>1024*2048,'ext'=>'jpg,jpeg,png,gif'])
                    ->rule('uniqid')
                    ->move('./uploads/usereditor');

        $result = [];

        if($info){
            $result['success']  = true;
            $result['file_path'] = url("uploads/usereditor/".$info->getSaveName());
        }else{
            $result['success']  = false;
            $result['msg']  = $file->getError();
        }

        return json( $result );
    }
}
