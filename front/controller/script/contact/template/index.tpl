<div class="content-container">
    <div class="page-header">
        <h1>{$lang.menu.contact}</h1>
    </div>

    <div class="contact-wrapper">
        {* Contact Info *}
        <div class="contact-info-col">
            <h2>{$settingWeb.subjectoffice|default:$settingWeb.subject}</h2>
            {if !empty($settingWeb.description)}
                <p class="contact-desc">{$settingWeb.description}</p>
            {/if}

            <ul class="contact-list">
                {if !empty($settingWeb.contact.address)}
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span><strong>{$lang.system.address}:</strong> {$settingWeb.contact.address}</span>
                    </li>
                {/if}
                {if !empty($settingWeb.contact.tel)}
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span><strong>{$lang.system.tel}:</strong> {$settingWeb.contact.tel}</span>
                    </li>
                {/if}
                {if !empty($settingWeb.contact.fax)}
                    <li>
                        <i class="fas fa-fax"></i>
                        <span><strong>{$lang.system.fax}:</strong> {$settingWeb.contact.fax}</span>
                    </li>
                {/if}
                {if !empty($settingWeb.contact.email)}
                    <li>
                        <i class="fas fa-envelope"></i>
                        <span><strong>{$lang.system.email}:</strong> <a href="mailto:{$settingWeb.contact.email}">{$settingWeb.contact.email}</a></span>
                    </li>
                {/if}
            </ul>

            {* Social Links *}
            {if !empty($settingWeb.social)}
                <div class="contact-social">
                    <h3>Social Media</h3>
                    <div class="social-icons">
                        {if !empty($settingWeb.social.facebook)}
                            <a href="{$settingWeb.social.facebook}" target="_blank" class="social-btn facebook"><i class="fab fa-facebook-f"></i></a>
                        {/if}
                        {if !empty($settingWeb.social.twitter)}
                            <a href="{$settingWeb.social.twitter}" target="_blank" class="social-btn twitter"><i class="fab fa-twitter"></i></a>
                        {/if}
                        {if !empty($settingWeb.social.youtube)}
                            <a href="{$settingWeb.social.youtube}" target="_blank" class="social-btn youtube"><i class="fab fa-youtube"></i></a>
                        {/if}
                        {if !empty($settingWeb.social.line)}
                            <a href="{$settingWeb.social.line}" target="_blank" class="social-btn line"><i class="fab fa-line"></i></a>
                        {/if}
                    </div>
                </div>
            {/if}
        </div>

        {* Contact Form *}
        <div class="contact-form-col">
            <h2>{$lang.system.send_message}</h2>

            {if !empty($contactSuccess)}
                <div class="alert alert-success">
                    <h4>{$lang.contact.thank_you}</h4>
                    <p>{$lang.contact.thank_you_desc}</p>
                </div>
            {else}
                <form action="{$base}{$ul}/contact" method="post" class="contact-form">
                    <input type="hidden" name="action" value="send_contact">
                    <div class="form-row">
                        <div class="form-group col-half">
                            <label for="fname">{$lang.contact.fname}</label>
                            <input type="text" id="fname" name="fname" class="form-control" required>
                        </div>
                        <div class="form-group col-half">
                            <label for="lname">{$lang.contact.lname}</label>
                            <input type="text" id="lname" name="lname" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-half">
                            <label for="email">{$lang.contact.email}</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group col-half">
                            <label for="phone">{$lang.contact.phone}</label>
                            <input type="tel" id="phone" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">{$lang.contact.subject}</label>
                        <input type="text" id="subject" name="subject" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="detail">{$lang.contact.detail}</label>
                        <textarea id="detail" name="detail" rows="5" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">{$lang.system.send_message}</button>
                </form>
            {/if}
        </div>
    </div>
</div>
