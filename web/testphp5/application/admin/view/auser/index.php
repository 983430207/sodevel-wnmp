{extend name="glob/base" /}



{block name="content"}
<div class="page-header">
    <h1><span>管理员</span> <small class='pull-right'><a href='{:url("admin/auser/add")}' class='btn btn-primary'>添加</a></small></h1>
</div>
<div class="table-responsive">
<table class="table">
    <thead>
          <tr>
            <th>#</th>
            <th>用户名</th>
            <th>管理</th>
          </tr>
        </thead>
    <tbody>
      {volist name="auData" id="item"}
      <tr>
        <th scope="row">{$item->id}</th>
        <td>{$item->username}</td>
        <td>
            <a href='{:url("admin/auser/modify",["id"=>$item->id])}' class='btn btn-default'>修改</a>
            <a href='{:url("admin/auser/del",["id"=>$item->id])}' class='btn btn-danger' onclick='return confirm("真的删除吗？不能恢复的！")'>删除</a>
        </td>
      </tr>
      {/volist}
    </tbody>
</table>
</div>
{/block}