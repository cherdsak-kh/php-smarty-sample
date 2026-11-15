<div class="intro-container">
    <div class="intro-box">
        <h1 class="intro-title">{$settingWeb.subjectoffice|default:$settingWeb.subject}</h1>
        {if !empty($settingWeb.description)}
            <p class="intro-desc">{$settingWeb.description}</p>
        {/if}
        <div class="intro-action">
            <a href="{$ul}/home" class="btn-enter">
                {$lang.intro.enter} <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
