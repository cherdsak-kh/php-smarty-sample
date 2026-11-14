<div class="content-container">
    {* Top Graphic / Banner Section *}
    {if !empty($callTopGraphic)}
        <div class="banner-section">
            <div class="banner-slider">
                {foreach $callTopGraphic as $keycallTopGraphic => $valuecallTopGraphic}
                    {if !empty($valuecallTopGraphic.subject)}
                        <div class="banner-item">
                            {if !empty($valuecallTopGraphic.pic)}
                                <img src="{$base}upload/tg/pictures/{$valuecallTopGraphic.pic}" alt="{$valuecallTopGraphic.subject}">
                            {/if}
                            <div class="banner-caption">
                                <h2>{$valuecallTopGraphic.subject}</h2>
                            </div>
                        </div>
                    {/if}
                {/foreach}
            </div>
        </div>
    {/if}

    {* Welcome Hero Section *}
    <div class="page-content hero-section">
        <h1 class="hero-title">{$settingWeb.subjectoffice|default:$settingWeb.subject|default:'ยินดีต้อนรับสู่เว็บไซต์'}</h1>
        {if !empty($settingWeb.description)}
            <p class="hero-desc">{$settingWeb.description}</p>
        {/if}
        <div class="hero-actions">
            <a href="{$base}{$ul}/about" class="btn-readmore">{$lang.menu.about} &rarr;</a>
            <a href="{$base}{$ul}/contact" class="btn-readmore" style="margin-left: 1rem;">{$lang.menu.contact} &rarr;</a>
        </div>
    </div>

    {* Latest News Section *}
    <div class="home-news-section" style="margin-top: 2.5rem;">
        <div class="section-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h2>{$lang.menu.news}</h2>
            <a href="{$base}{$ul}/news" class="btn-readmore">{$lang.system.viewsall} &rarr;</a>
        </div>
        {if !empty($callLatestNews)}
            <div class="news-grid">
                {foreach $callLatestNews as $keyNews => $valNews}
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
                            <h3 class="news-title">
                                <a href="{$base}{$ul}/news/detail/{$valNews.id}">{$valNews.subject}</a>
                            </h3>
                            {if !empty($valNews.title)}
                                <p class="news-desc">{$valNews.title}</p>
                            {/if}
                            <a href="{$base}{$ul}/news/detail/{$valNews.id}" class="btn-readmore">{$lang.system.readmore} &rarr;</a>
                        </div>
                    </div>
                {/foreach}
            </div>
        {else}
            <div class="page-content">
                <div class="no-data">
                    <p>{$lang.datanotfound}</p>
                </div>
            </div>
        {/if}
    </div>
</div>
