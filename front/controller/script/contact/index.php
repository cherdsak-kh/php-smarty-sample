<?php
$menuActive = "contact";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';
$ContactPage = new ContactPage;

$contactSent = false;
if (!empty($_POST['action']) && $_POST['action'] === 'send_contact') {
    // Process contact form message
    $contactSent = true;
    $smarty->assign("contactSuccess", true);
}

/*## Start SEO #####*/
$seo_desc = !empty($settingWeb['description']) ? $settingWeb['description'] : "";
$seo_title = isset($lang['menu']['contact']) ? $lang['menu']['contact'] : 'Contact Us';
$seo_keyword = !empty($settingWeb['keywords']) ? $settingWeb['keywords'] : "";
$seo_pic = "";
Seo($seo_title, $seo_desc, $seo_keyword, $seo_pic);
/*## End SEO #####*/

$settingPage = array(
    "page" => $menuActive,
    "template" => "index.tpl",
    "display" => "page"
);

$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
