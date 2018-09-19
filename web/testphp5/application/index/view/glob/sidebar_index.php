<div class="list-group">
    <a class="list-group-item active">
        优秀博主
    </a>
    {volist name=":getNewUsers()" id="item"}
        <a href="{$item->blogurl}" class="list-group-item">{$item->nickname}</a>
    {/volist}
</div>

<div class="list-group">
    <a class="list-group-item active">
        优秀博文
    </a>
    {volist name=":getGoodBlogs()" id="item"}
        <a href="{$item->url}" class="list-group-item">{$item->title}</a>
    {/volist}
</div>