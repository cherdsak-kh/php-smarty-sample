<?php
$menuActive = "home";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';
$HomePage = new HomePage;

$subpage = isset($url->segment[1]) ? $url->segment[1] : '';
switch ($subpage) {
    default:
        $callTopGraphic  = $HomePage->callTopGraphic($config['tgp']['masterkey']);
        $hasTopGraphic = ($callTopGraphic && (!empty($callTopGraphic->_numOfRows) || (method_exists($callTopGraphic, 'RecordCount') && $callTopGraphic->RecordCount() > 0)));
        $smarty->assign("callTopGraphic", $hasTopGraphic ? $callTopGraphic : array());

        $callLatestNews = $HomePage->callLatestNews($config['news']['masterkey'], 3);
        $hasLatestNews = ($callLatestNews && (!empty($callLatestNews->_numOfRows) || (method_exists($callLatestNews, 'RecordCount') && $callLatestNews->RecordCount() > 0)));
        $smarty->assign("callLatestNews", $hasLatestNews ? $callLatestNews : array());
        
        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = isset($lang['menu']['home']) ? $lang['menu']['home'] : '';
        $seo_keyword = "";
        $seo_pic = "";
        Seo($seo_title, $seo_desc, $seo_keyword, $seo_pic);
        /*## End SEO #####*/

        $settingPage = array(
            "page" => $menuActive,
            "template" => "index.tpl",
            "display" => "page"
        );
        break;
}
$smarty->assign("menuActive", $menuActive);
$smarty->assign("fileInclude", $settingPage);
