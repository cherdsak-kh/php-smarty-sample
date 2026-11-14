<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-col brand-col">
            <h3 class="footer-title">{$settingWeb.subjectoffice|default:$settingWeb.subject|default:'PHP Smarty Sample'}</h3>
            {if !empty($settingWeb.description)}
                <p class="footer-desc">{$settingWeb.description}</p>
            {/if}
            {if !empty($settingWeb.contact.address)}
                <p class="footer-address"><i class="fas fa-map-marker-alt"></i> {$settingWeb.contact.address}</p>
            {/if}
        </div>
        <div class="footer-col links-col">
            <h4 class="footer-subtitle">{$lang.system.menu}</h4>
            <ul class="footer-menu">
                <li><a href="{$base}{$ul}/home">{$lang.menu.home}</a></li>
                <li><a href="{$base}{$ul}/about">{$lang.menu.about}</a></li>
                <li><a href="{$base}{$ul}/news">{$lang.menu.news}</a></li>
                <li><a href="{$base}{$ul}/contact">{$lang.menu.contact}</a></li>
                <li><a href="{$base}{$ul}/terms">{$lang.menu.terms}</a></li>
            </ul>
        </div>
        <div class="footer-col contact-col">
            <h4 class="footer-subtitle">{$lang.menu.contact}</h4>
            {if !empty($settingWeb.contact.tel)}
                <p><i class="fas fa-phone-alt"></i> {$settingWeb.contact.tel}</p>
            {/if}
            {if !empty($settingWeb.contact.email)}
                <p><i class="fas fa-envelope"></i> {$settingWeb.contact.email}</p>
            {/if}
            {if !empty($settingWeb.social)}
                <div class="footer-socials">
                    {if !empty($settingWeb.social.facebook)}
                        <a href="{$settingWeb.social.facebook}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    {/if}
                    {if !empty($settingWeb.social.twitter)}
                        <a href="{$settingWeb.social.twitter}" target="_blank"><i class="fab fa-twitter"></i></a>
                    {/if}
                    {if !empty($settingWeb.social.youtube)}
                        <a href="{$settingWeb.social.youtube}" target="_blank"><i class="fab fa-youtube"></i></a>
                    {/if}
                    {if !empty($settingWeb.social.line)}
                        <a href="{$settingWeb.social.line}" target="_blank"><i class="fab fa-line"></i></a>
                    {/if}
                </div>
            {/if}
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-bottom-container">
            <p class="copyright">&copy; {date("Y")} {$settingWeb.subjectoffice|default:$settingWeb.subject|default:'PHP Smarty Sample'}. All rights reserved.</p>
            <div class="footer-bottom-links">
                <a href="{$base}{$ul}/terms">{$lang.menu.terms}</a>
            </div>
        </div>
    </div>
</footer>
