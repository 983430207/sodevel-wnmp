<div class="media">
    <div class="media-left">
        <a href="#">
            <img width="50" class="media-object" src="{$item->image}" alt="...">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading "><a href='{$item->url}'>{$item->title}</a></h4>
        <p class='text-muted'>{$item->intro}... 作者：<a href="{$item->user->blogurl}">{$item->user->nickname}</a></p>
    </div>
</div>