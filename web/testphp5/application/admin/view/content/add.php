{extend name="glob/base" /}

{block name='header'}
<script type="text/javascript" src="{:url('static/simditor/scripts')}/module.js"></script>
        <script type="text/javascript" src="{:url('static/simditor/scripts')}/hotkeys.js"></script>
        <script type="text/javascript" src="{:url('static/simditor/scripts')}/uploader.js"></script>
        <script type="text/javascript" src="{:url('static/simditor/scripts')}/simditor.js"></script>    
        <link rel="stylesheet" type="text/css" href="{:url('static/simditor/styles')}/simditor.css" />
{/block}

{block name="content"}
<div class="page-header">
    <h1><span>内容 {$typeName}</span></h1>
</div>
<div class='col-sm-8'>
    <form method="post" action="{:url('admin/content/save')}">
      {:token()}
      <input type='hidden' name='id' value='{$item->id|default=""}'/>
      <div class="form-group">
        <label for="title">标题</label>
        <input type="text" name='title' class="form-control" id="title" placeholder="请输入用户名" value='{$item->title|default=""}'>
      </div>
      <div class="form-group">
        <label for="password">内容</label>
        <textarea id='content' name='content' class='form-control' rows='20'>{$item->content|default=""}</textarea>
        <script>
        var editor = new Simditor({
          textarea: $('#content'),
          toolbar:[
            'title',
            'bold',
            'italic',
            'underline',
            'strikethrough',
            'fontScale',
            'color',
            'ol',             
            'ul',             
            'blockquote',
            'code',           
            'table',
            'link',
            'image',
            'hr',             
            'indent',
            'outdent',
            'alignment'
          ],
          upload:{
            url:"{:url('admin/content/up')}",
            params:{},
            fileKey:"file1",
            leaveConfirm:"正在上传图片，你确定要放弃吗？"
          },
          pasteImage:true
        });
      </script>
      </div>



      <div class="form-group">
        <label for="content_status">状态</label>
        <select name='content_status' id='content_status' class="form-control">
          {volist name='content_status' id='row'}
          <option value='{$key}'>{$row|strip_tags}</option>
          {/volist}
        </select>
        <script>
          $("#content_status").val( {$item->content_status|default=1} );
        </script>
      </div>

      <button type="submit" class="btn btn-default">提交</button>
    </form>
</div>

{/block}