<div class="content-container">
    <div class="page-header">
        <h1>{$lang.menu.news}</h1>
    </div>

    {* Group / Category Filter *}
    {if !empty($callGroup)}
        <div class="category-tabs">
            <ul class="nav-tabs">
                <li class="{if empty($currentGid)}active{/if}">
                    <a href="{$ul}/news">{$lang.news.all}</a>
                </li>
                {foreach $callGroup as $keyGroup => $valGroup}
                    <li class="{if $currentGid eq $valGroup.id}active{/if}">
                        <a href="{$ul}/news?gid={$valGroup.id}">{$valGroup.subject}</a>
                    </li>
                {/foreach}
            </ul>
        </div>
    {/if}

    {* News List *}
    <div class="news-list-block">
        {if !empty($callNewsList)}
            <div class="news-grid">
                {foreach $callNewsList as $keyNews => $valNews}
                    <div class="news-card">
                        <div class="news-thumb">
                            {if !empty($valNews.pic)}
                                <img src="{$base}upload/nw/pictures/{$valNews.pic}" alt="{$valNews.subject}">
                            {else}
                                <img src="{$template}/nopic.jpg" alt="{$valNews.subject}">
                            {/if}
                        </div>
                        <div class="news-info">
                            <span class="news-date"><i class="far fa-calendar-alt"></i> {$valNews.credate|DateFormat}</span>
                            <span class="news-views"><i class="far fa-eye"></i> {$valNews.view|number_format} {$lang.news.views}</span>
                            <h3 class="news-title">
                                {if $valNews.type eq 'url'}
                                    <a href="{$valNews.url}" target="_blank">{$valNews.subject}</a>
                                {else}
                                    <a href="{$ul}/news/detail/{$valNews.id}">{$valNews.subject}</a>
                                {/if}
                            </h3>
                            {if !empty($valNews.title)}
                                <p class="news-desc">{$valNews.title}</p>
                            {/if}
                            <a href="{$ul}/news/detail/{$valNews.id}" class="btn-readmore">{$lang.system.readmore} &rarr;</a>
                        </div>
                    </div>
                {/foreach}
            </div>

            {* Pagination *}
            {include file="{$incfile.pagination}" title=pagination}
        {else}
            <div class="no-data">
                <p>{$lang.datanotfound}</p>
            </div>
        {/if}
    </div>
</div>
