<?php
$menuActive = "news";
$listjs[] = '<script type="text/javascript" src="' . _URL . 'front/controller/script/' . $menuActive . '/js/script.js"></script>';
$NewsPage = new NewsPage;

$subpage = isset($url->segment[1]) ? $url->segment[1] : '';

switch ($subpage) {
    case 'detail':
        $contentID = isset($url->segment[2]) ? intval($url->segment[2]) : 0;
        $callNewsDetail = $NewsPage->callNewsDetail($config['news']['masterkey'], $contentID);
        $hasDetail = ($callNewsDetail && (!empty($callNewsDetail->_numOfRows) || (method_exists($callNewsDetail, 'RecordCount') && $callNewsDetail->RecordCount() > 0)));

        if ($hasDetail) {
            // Update view count
            mainPage::updateView($contentID, $config['news']['masterkey'], $config['news']['db']);

            // Load HTML content
            $detailHtml = "";
            if (!empty($callNewsDetail->fields['htmlfilename'])) {
                $htmlPath = _DIR . $core_pathname_upload . "/" . $config['news']['masterkey'] . "/html/" . $callNewsDetail->fields['htmlfilename'];
                if (file_exists($htmlPath)) {
                    $detailHtml = file_get_contents($htmlPath);
                }
            }
            $smarty->assign("detailHtml", $detailHtml);

            // Load Album
            $callAlbum = mainPage::Call_Album($contentID, $config['newsa']['db']);
            $hasAlbum = ($callAlbum && (!empty($callAlbum->_numOfRows) || (method_exists($callAlbum, 'RecordCount') && $callAlbum->RecordCount() > 0)));
            $smarty->assign("callAlbum", $hasAlbum ? $callAlbum : array());

            // Load Attachments
            $callFile = mainPage::Call_File($contentID);
            $hasFile = ($callFile && (!empty($callFile->_numOfRows) || (method_exists($callFile, 'RecordCount') && $callFile->RecordCount() > 0)));
            $smarty->assign("callFile", $hasFile ? $callFile : array());

            /*## Start SEO #####*/
            $seo_desc = !empty($callNewsDetail->fields['description']) ? $callNewsDetail->fields['description'] : "";
            $seo_title = !empty($callNewsDetail->fields['subject']) ? $callNewsDetail->fields['subject'] : (isset($lang['menu']['news']) ? $lang['menu']['news'] : 'News');
            $seo_keyword = !empty($callNewsDetail->fields['keywords']) ? $callNewsDetail->fields['keywords'] : "";
            $seo_pic = !empty($callNewsDetail->fields['pic']) ? _URL . $core_pathname_upload . "/" . $config['news']['masterkey'] . "/pictures/" . $callNewsDetail->fields['pic'] : "";
            Seo($seo_title, $seo_desc, $seo_keyword, $seo_pic);
            /*## End SEO #####*/
        }

        $smarty->assign("callNewsDetail", $hasDetail ? $callNewsDetail : array());

        $settingPage = array(
            "page" => $menuActive,
            "template" => "detail.tpl",
            "display" => "page"
        );
        break;

    default:
        $gid = isset($_GET['gid']) ? intval($_GET['gid']) : (isset($url->segment[2]) ? intval($url->segment[2]) : 0);
        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';
        $pageCurrent = isset($page['on']) ? intval($page['on']) : 1;
        $limit = isset($limitpage['showperPage']) ? $limitpage['showperPage'] : 8;

        // Categories
        $callGroup = $NewsPage->callNewsGroup($config['news']['masterkey']);
        $hasGroup = ($callGroup && (!empty($callGroup->_numOfRows) || (method_exists($callGroup, 'RecordCount') && $callGroup->RecordCount() > 0)));
        $smarty->assign("callGroup", $hasGroup ? $callGroup : array());

        // News List
        $callNewsList = $NewsPage->callNewsList($config['news']['masterkey'], $gid, $keywords, $limit, $pageCurrent);
        $hasNews = ($callNewsList && (!empty($callNewsList->_numOfRows) || (method_exists($callNewsList, 'RecordCount') && $callNewsList->RecordCount() > 0)));
        $smarty->assign("callNewsList", $hasNews ? $callNewsList : array());

        // Pagination
        $totalNews = $NewsPage->callNewsTotal($config['news']['masterkey'], $gid, $keywords);
        $totalPage = ceil($totalNews / $limit);
        $pagination = array(
            "curent" => $pageCurrent,
            "totalpage" => ($totalPage > 0 ? $totalPage : 1),
            "total" => $totalNews,
            "method" => $page
        );
        $smarty->assign("pagination", $pagination);
        $smarty->assign("currentGid", $gid);
        $smarty->assign("currentKeywords", $keywords);

        /*## Start SEO #####*/
        $seo_desc = "";
        $seo_title = isset($lang['menu']['news']) ? $lang['menu']['news'] : 'News';
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
