<div class="content-container">
    <div class="page-header">
        <h1>{$lang.menu.about}</h1>
    </div>

    <div class="page-content">
        {if !empty($callAbout)}
            {foreach $callAbout as $keyAbout => $valAbout}
                <article class="about-item">
                    {if !empty($valAbout.subject)}
                        <h2>{$valAbout.subject}</h2>
                    {/if}
                    {if !empty($valAbout.title)}
                        <p class="lead">{$valAbout.title}</p>
                    {/if}
                    {if !empty($aboutHtml)}
                        <div class="about-detail">
                            {$aboutHtml}
                        </div>
                    {/if}
                </article>
            {/foreach}
        {else}
            <div class="no-data">
                <p>{$lang.datanotfound}</p>
            </div>
        {/if}
    </div>
</div>
