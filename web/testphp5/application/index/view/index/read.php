{extend name="glob/base" /}
{block name="content"}

<h2>{$blogitem->title}</h2>
<p class='text-right text-muted'>
    作者：<a href="{$blogitem->user->blogurl}">{$blogitem->user->nickname}</a>
    时间：{$blogitem->create_time}
</p>
<div class='well' style='line-height:200%;font-size:1.2em'>
{$blogitem->content|raw}
</div>

{/block}