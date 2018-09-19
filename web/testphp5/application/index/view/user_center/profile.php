{extend name="glob/base" /}

{block name="content"}
<div class="page-header">
    <h1><span>个人资料</span></h1>
</div>
<div class='col-sm-8'>
    <form method="post" action="{:url('index/usercenter/profile_save')}">
      {:token()}
      <div class="form-group">
        <label for="username">用户</label>
        <input type="text" class="form-control" id="username" placeholder="请输入用户名" value='{$user->username|default=""}' disabled>
      </div>
      <div class="form-group">
        <label for="password">密码 (如使用原密码，请留空)</label>
        <input type="password" name='password' class="form-control" id="password" placeholder="如使用原密码，请留空">
      </div>


      <div class="form-group">
        <label for="nickname">昵称</label>
        <input type="text" name='nickname' class="form-control" id="nickname" placeholder="请输入昵称" value='{$user->nickname|default=""}'>
      </div>
      <div class="form-group">
        <label for="phone">电话</label>
        <input type="text" name='phone' class="form-control" id="phone" placeholder="请输入电话" value='{$user->phone|default=""}'>
      </div>
      <div class="form-group">
        <label for="email">邮箱</label>
        <input type="text" name='email' class="form-control" id="email" placeholder="请输入邮箱" value='{$user->email|default=""}'>
      </div>

      <button type="submit" class="btn btn-default">提交</button>
    </form>
</div>
{/block}

{block name="sidebar"}
    {include file='glob/sidebar_usercenter' /}
{/block}