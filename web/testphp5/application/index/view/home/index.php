{extend name="glob/base" /}
{block name="content"}
<div class="jumbotron">
  <h1>{$homeUser->nickname}的个人博客</h1>
  <p>这里应该是一句话简介，但是我并没有做这个字段，所以暂时用纯文本代替。</p>
</div>
<div class="page-header">
  <h1>我的博文</h1>
</div>
{volist name="newData" id="item"}
    {include file='glob/blogitem'}
{/volist}
{$newData->render()|raw}
{/block}