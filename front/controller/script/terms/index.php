<?php
$menuActive = "terms";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';

/*## Start SEO #####*/
$seo_desc = !empty($settingWeb['description']) ? $settingWeb['description'] : "";
$seo_title = isset($lang['terms']['title']) ? $lang['terms']['title'] : 'Terms & Conditions';
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
