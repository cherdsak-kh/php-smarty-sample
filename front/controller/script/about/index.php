<?php
$menuActive = "about";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';
$AboutPage = new AboutPage;

$callAbout = $AboutPage->callAbout($config['about']['masterkey']);
$hasAbout = ($callAbout && (!empty($callAbout->_numOfRows) || (method_exists($callAbout, 'RecordCount') && $callAbout->RecordCount() > 0)));
$smarty->assign("callAbout", $hasAbout ? $callAbout : array());

// Load HTML content if available
$aboutHtml = "";
if ($hasAbout && !empty($callAbout->fields['htmlfilename'])) {
    $htmlPath = _DIR . $core_pathname_upload . "/" . $config['about']['masterkey'] . "/html/" . $callAbout->fields['htmlfilename'];
    if (file_exists($htmlPath)) {
        $aboutHtml = file_get_contents($htmlPath);
    }
}
$smarty->assign("aboutHtml", $aboutHtml);

/*## Start SEO #####*/
$seo_desc = ($hasAbout && !empty($callAbout->fields['description'])) ? $callAbout->fields['description'] : "";
$seo_title = ($hasAbout && !empty($callAbout->fields['subject'])) ? $callAbout->fields['subject'] : (isset($lang['menu']['about']) ? $lang['menu']['about'] : 'About Us');
$seo_keyword = ($hasAbout && !empty($callAbout->fields['keywords'])) ? $callAbout->fields['keywords'] : "";
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
