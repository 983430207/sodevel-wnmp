{extend name="glob/base" /}
{block name="content"}
<div class="page-header">
  <h1>最新博文</h1>
</div>
{volist name="newData" id="item"}
    {include file='glob/blogitem'}
{/volist}
{$newData->render()|raw}
{/block}