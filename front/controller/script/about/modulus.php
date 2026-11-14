<?php
class AboutPage {
    function callAbout($masterkey) {
        global $config, $db, $url;
        $language = $url->pagelang[4];

        $sql = "SELECT
            " . $config['about']['db'] . "." . $config['about']['db'] . "_id as id,
            " . $config['about']['db'] . "." . $config['about']['db'] . "_masterkey as masterkey,
            " . $config['about']['db'] . "." . $config['about']['db'] . "_credate as credate,
            " . $config['about']['db'] . "." . $config['about']['db'] . "_view as view,

            " . $config['aboutl']['db'] . "." . $config['aboutl']['db'] . "_subject as subject,
            " . $config['aboutl']['db'] . "." . $config['aboutl']['db'] . "_title as title,
            " . $config['aboutl']['db'] . "." . $config['aboutl']['db'] . "_htmlfilename as htmlfilename,
            " . $config['aboutl']['db'] . "." . $config['aboutl']['db'] . "_description as description,
            " . $config['aboutl']['db'] . "." . $config['aboutl']['db'] . "_keywords as keywords,
            " . $config['aboutl']['db'] . "." . $config['aboutl']['db'] . "_metatitle as metatitle

            FROM " . $config['about']['db'] . "
            INNER JOIN " . $config['aboutl']['db'] . " ON " . $config['aboutl']['db'] . "_cid = " . $config['about']['db'] . "_id
            WHERE
            " . $config['about']['db'] . "." . $config['about']['db'] . "_masterkey = '" . $masterkey . "' AND
            " . $config['aboutl']['db'] . "." . $config['aboutl']['db'] . "_language = '" . $language . "' AND
            " . $config['about']['db'] . "." . $config['about']['db'] . "_status != 'Disable' AND
            ((" . $config['about']['db'] . "." . $config['about']['db'] . "_sdate='0000-00-00 00:00:00' AND
            " . $config['about']['db'] . "." . $config['about']['db'] . "_edate='0000-00-00 00:00:00') OR
            (" . $config['about']['db'] . "." . $config['about']['db'] . "_sdate='0000-00-00 00:00:00' AND
            TO_DAYS(" . $config['about']['db'] . "." . $config['about']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
            (TO_DAYS(" . $config['about']['db'] . "." . $config['about']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
            " . $config['about']['db'] . "." . $config['about']['db'] . "_edate='0000-00-00 00:00:00' ) OR
            (TO_DAYS(" . $config['about']['db'] . "." . $config['about']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
            TO_DAYS(" . $config['about']['db'] . "." . $config['about']['db'] . "_edate)>=TO_DAYS(NOW()) ))
            ORDER BY " . $config['about']['db'] . "." . $config['about']['db'] . "_order DESC";

        $result = $db->execute($sql);
        return $result;
    }
}
