<?php
$infoSetting = $mainPage->infoSetting;

#function assign seo & title page
function Seo($title = '', $desc = '', $keyword = '', $pic = '')
{
    global $smarty, $infoSetting;
    $list = array();
    $metatitle = (!empty($infoSetting) && !empty($infoSetting->fields['metatitle'])) ? $infoSetting->fields['metatitle'] : '';
    $subject = (!empty($infoSetting) && !empty($infoSetting->fields['subject'])) ? $infoSetting->fields['subject'] : '';
    $defaultTitle = !empty($metatitle) ? $metatitle : (!empty($subject) ? $subject : 'Template Website');

    if (!empty($title)) {
        $list['title'] = trim($title) . " - " . $defaultTitle;
    } else {
        $list['title'] = $defaultTitle;
    }

    if (!empty($desc)) {
        $list['desc'] = trim($desc);
    } else {
        $list['desc'] = (!empty($infoSetting) && !empty($infoSetting->fields['description'])) ? $infoSetting->fields['description'] : '';
    }

    if (!empty($keyword)) {
        $list['keyword'] = trim($keyword);
    } else {
        $list['keyword'] = (!empty($infoSetting) && !empty($infoSetting->fields['keywords'])) ? $infoSetting->fields['keywords'] : '';
    }
    $smarty->assign("seo", $list);
}

#### SETTING
$settingWeb = array();
if (!empty($infoSetting) && !empty($infoSetting->fields)) {
    $settingWeb['id'] = isset($infoSetting->fields['id']) ? $infoSetting->fields['id'] : '';
    $settingWeb['masterkey'] = isset($infoSetting->fields['masterkey']) ? $infoSetting->fields['masterkey'] : '';
    $settingWeb['subject'] = isset($infoSetting->fields['subject']) ? $infoSetting->fields['subject'] : '';
    $settingWeb['subjectoffice'] = isset($infoSetting->fields['subjectoffice']) ? $infoSetting->fields['subjectoffice'] : '';
    $settingWeb['description'] = isset($infoSetting->fields['description']) ? $infoSetting->fields['description'] : '';
    $settingWeb['keywords'] = isset($infoSetting->fields['keywords']) ? $infoSetting->fields['keywords'] : '';
    $settingWeb['metatitle'] = isset($infoSetting->fields['metatitle']) ? $infoSetting->fields['metatitle'] : '';
    $settingWeb['contact'] = !empty($infoSetting->fields['config']) ? @unserialize($infoSetting->fields['config']) : array();
    $settingWeb['social'] = !empty($infoSetting->fields['social']) ? @unserialize($infoSetting->fields['social']) : array();
    $settingWeb['addresspic'] = isset($infoSetting->fields['addresspic']) ? $infoSetting->fields['addresspic'] : '';
}
$smarty->assign("settingWeb", $settingWeb);
