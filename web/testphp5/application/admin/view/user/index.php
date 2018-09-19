{extend name="glob/base" /}



{block name="content"}
<div class="page-header">
    <h1><span>用户</span> <small class='pull-right'><a href='{:url("admin/user/add")}' class='btn btn-primary'>添加</a></small></h1>
</div>

<div class='well'>
<form class="form-inline" action="{:url('admin/user/index')}" method="get">
    <div class="form-group">
        <label for="exampleInputName2">关键字</label>
        <input type="text" class="form-control" id='key' name='key' placeholder="请输入用户名、昵称、电话、邮箱进行搜索" value='{$key|default=""}'>
    </div>
    <button type="submit" class="btn btn-default">搜索</button>
</form>
</div>

<div class="table-responsive">
<table class="table">
    <thead>
          <tr>
            <th>#</th>
            <th>用户名</th>
            <th>昵称</th>
            <th>电话</th>
            <th>邮箱</th>
            <th>状态</th>
            <th>管理</th>
          </tr>
        </thead>
    <tbody>
    {volist name="uData" id="item"}
      <tr>
        <th scope="row">{$item->id}</th>
        <td>{$item->username}</td>
        <td>{$item->nickname}</td>
        <td>{$item->phone}</td>
        <td>{$item->email}</td>
        <td>
            {$user_status[ $item->user_status ]|raw}
        </td>
        <td>
            <a href='{:url("admin/user/modify",["id"=>$item->id])}' class='btn btn-default'>修改</a>
            <a href='{:url("admin/user/status",["id"=>$item->id,"status"=>$item->user_status])}' class='btn btn-danger'>切换状态</a>
        </td>
      </tr>
    {/volist}
    </tbody>
</table>
{$uData->render()|raw}
</div>
{/block}