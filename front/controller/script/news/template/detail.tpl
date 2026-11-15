<div class="content-container">
    {if !empty($callNewsDetail)}
        <article class="news-detail-wrapper">
            <div class="news-detail-header">
                <a href="{$ul}/news" class="btn-back"><i class="fas fa-arrow-left"></i> {$lang.news.back}</a>
                <h1 class="detail-title">{$callNewsDetail.subject}</h1>
                <div class="detail-meta">
                    <span class="meta-date"><i class="far fa-calendar-alt"></i> {$callNewsDetail.credate|DateFormat}</span>
                    <span class="meta-views"><i class="far fa-eye"></i> {$callNewsDetail.view|number_format} {$lang.news.views}</span>
                </div>
            </div>

            {if !empty($callNewsDetail.pic)}
                <div class="detail-cover-pic">
                    <img src="{$base}upload/nw/pictures/{$callNewsDetail.pic}" alt="{$callNewsDetail.subject}">
                </div>
            {/if}

            {if !empty($callNewsDetail.title)}
                <div class="detail-lead">
                    <p>{$callNewsDetail.title}</p>
                </div>
            {/if}

            {if !empty($detailHtml)}
                <div class="detail-body">
                    {$detailHtml}
                </div>
            {/if}

            {* Photo Album *}
            {if !empty($callAlbum)}
                <div class="detail-album-section">
                    <h3>{$lang.news.album}</h3>
                    <div class="album-grid">
                        {foreach $callAlbum as $keyAlbum => $valAlbum}
                            <div class="album-item">
                                <img src="{$base}upload/nw/album/{$valAlbum.filename}" alt="{$valAlbum.name}">
                            </div>
                        {/foreach}
                    </div>
                </div>
            {/if}

            {* Attachments *}
            {if !empty($callFile)}
                <div class="detail-files-section">
                    <h3>{$lang.news.download}</h3>
                    <ul class="file-list">
                        {foreach $callFile as $keyFile => $valFile}
                            <li>
                                <a href="{$base}upload/nw/file/{$valFile.filename}" target="_blank" download>
                                    <i class="far fa-file-alt"></i> {$valFile.name|default:$valFile.filename}
                                </a>
                            </li>
                        {/foreach}
                    </ul>
                </div>
            {/if}

            {* Social Sharing *}
            <div class="detail-share-section">
                {include file="sharing.tpl" title=share}
            </div>
        </article>
    {else}
        <div class="no-data">
            <p>{$lang.datanotfound}</p>
            <a href="{$ul}/news" class="btn-back">{$lang.news.back}</a>
        </div>
    {/if}
</div>
