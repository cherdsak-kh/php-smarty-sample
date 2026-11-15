<header class="site-header">
    <div class="header-container">
        <div class="site-brand">
            <a href="{$ul}/home" class="brand-link">
                <span class="brand-name">{$settingWeb.subjectoffice|default:$settingWeb.subject|default:'PHP Smarty Sample'}</span>
            </a>
        </div>
        <nav class="site-nav">
            <ul class="nav-menu">
                <li class="nav-item {if $navactive eq 'home'}active{/if}">
                    <a href="{$ul}/home" class="nav-link">{$lang.menu.home}</a>
                </li>
                <li class="nav-item {if $navactive eq 'about'}active{/if}">
                    <a href="{$ul}/about" class="nav-link">{$lang.menu.about}</a>
                </li>
                <li class="nav-item {if $navactive eq 'news'}active{/if}">
                    <a href="{$ul}/news" class="nav-link">{$lang.menu.news}</a>
                </li>
                <li class="nav-item {if $navactive eq 'contact'}active{/if}">
                    <a href="{$ul}/contact" class="nav-link">{$lang.menu.contact}</a>
                </li>
            </ul>
        </nav>
        <div class="header-actions">
            <div class="lang-switch">
                <a href="{$base}th/{$navactive}" class="lang-link {if $langon eq 'th'}active{/if}">TH</a>
                <span class="lang-divider">|</span>
                <a href="{$base}en/{$navactive}" class="lang-link {if $langon eq 'en'}active{/if}">EN</a>
            </div>
            <a href="{$base}weadmin/" target="_blank" class="btn-weadmin" title="เข้าสู่ระบบหลังบ้าน">
                <i class="fas fa-lock"></i> Weadmin
            </a>
        </div>
    </div>
</header>
