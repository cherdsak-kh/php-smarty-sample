<?php
class NewsPage {
    function callNewsGroup($masterkey) {
        global $config, $db, $url;
        $language = $url->pagelang[4];

        $sql = "SELECT
            " . $config['newsg']['db'] . "." . $config['newsg']['db'] . "_id as id,
            " . $config['newsg']['db'] . "." . $config['newsg']['db'] . "_masterkey as masterkey,
            " . $config['newsgl']['db'] . "." . $config['newsgl']['db'] . "_subject as subject
            FROM " . $config['newsg']['db'] . "
            INNER JOIN " . $config['newsgl']['db'] . " ON " . $config['newsgl']['db'] . "_cid = " . $config['newsg']['db'] . "_id
            WHERE
            " . $config['newsg']['db'] . "." . $config['newsg']['db'] . "_masterkey = '" . $masterkey . "' AND
            " . $config['newsgl']['db'] . "." . $config['newsgl']['db'] . "_language = '" . $language . "' AND
            " . $config['newsg']['db'] . "." . $config['newsg']['db'] . "_status != 'Disable'
            ORDER BY " . $config['newsg']['db'] . "." . $config['newsg']['db'] . "_order DESC";

        return $db->execute($sql);
    }

    function callNewsList($masterkey, $gid = 0, $keywords = '', $limit = 10, $page = 1) {
        global $config, $db, $url;
        $language = $url->pagelang[4];
        $offset = ($page - 1) * $limit;

        $sql = "SELECT
            " . $config['news']['db'] . "." . $config['news']['db'] . "_id as id,
            " . $config['news']['db'] . "." . $config['news']['db'] . "_masterkey as masterkey,
            " . $config['news']['db'] . "." . $config['news']['db'] . "_credate as credate,
            " . $config['news']['db'] . "." . $config['news']['db'] . "_view as view,
            " . $config['news']['db'] . "." . $config['news']['db'] . "_gid as gid,

            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_subject as subject,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_title as title,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_pic as pic,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_type as type,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_url as url

            FROM " . $config['news']['db'] . "
            INNER JOIN " . $config['newsl']['db'] . " ON " . $config['newsl']['db'] . "_cid = " . $config['news']['db'] . "_id
            WHERE
            " . $config['news']['db'] . "." . $config['news']['db'] . "_masterkey = '" . $masterkey . "' AND
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_language = '" . $language . "' AND
            " . $config['news']['db'] . "." . $config['news']['db'] . "_status != 'Disable' AND
            ((" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate='0000-00-00 00:00:00' AND
            " . $config['news']['db'] . "." . $config['news']['db'] . "_edate='0000-00-00 00:00:00') OR
            (" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate='0000-00-00 00:00:00' AND
            TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
            (TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
            " . $config['news']['db'] . "." . $config['news']['db'] . "_edate='0000-00-00 00:00:00' ) OR
            (TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
            TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_edate)>=TO_DAYS(NOW()) ))";

        if (!empty($gid)) {
            $sql .= " AND " . $config['news']['db'] . "." . $config['news']['db'] . "_gid = '" . intval($gid) . "'";
        }
        if (!empty($keywords)) {
            $cleanKw = addslashes($keywords);
            $sql .= " AND (" . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_subject LIKE '%" . $cleanKw . "%'
                     OR " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_title LIKE '%" . $cleanKw . "%')";
        }

        $sql .= " ORDER BY " . $config['news']['db'] . "." . $config['news']['db'] . "_order DESC";
        $sql .= " LIMIT " . intval($offset) . ", " . intval($limit);

        return $db->execute($sql);
    }

    function callNewsTotal($masterkey, $gid = 0, $keywords = '') {
        global $config, $db, $url;
        $language = $url->pagelang[4];

        $sql = "SELECT COUNT(*) as total
            FROM " . $config['news']['db'] . "
            INNER JOIN " . $config['newsl']['db'] . " ON " . $config['newsl']['db'] . "_cid = " . $config['news']['db'] . "_id
            WHERE
            " . $config['news']['db'] . "." . $config['news']['db'] . "_masterkey = '" . $masterkey . "' AND
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_language = '" . $language . "' AND
            " . $config['news']['db'] . "." . $config['news']['db'] . "_status != 'Disable' AND
            ((" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate='0000-00-00 00:00:00' AND
            " . $config['news']['db'] . "." . $config['news']['db'] . "_edate='0000-00-00 00:00:00') OR
            (" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate='0000-00-00 00:00:00' AND
            TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
            (TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
            " . $config['news']['db'] . "." . $config['news']['db'] . "_edate='0000-00-00 00:00:00' ) OR
            (TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
            TO_DAYS(" . $config['news']['db'] . "." . $config['news']['db'] . "_edate)>=TO_DAYS(NOW()) ))";

        if (!empty($gid)) {
            $sql .= " AND " . $config['news']['db'] . "." . $config['news']['db'] . "_gid = '" . intval($gid) . "'";
        }
        if (!empty($keywords)) {
            $cleanKw = addslashes($keywords);
            $sql .= " AND (" . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_subject LIKE '%" . $cleanKw . "%'
                     OR " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_title LIKE '%" . $cleanKw . "%')";
        }

        $result = $db->execute($sql);
        return ($result && isset($result->fields['total'])) ? intval($result->fields['total']) : 0;
    }

    function callNewsDetail($masterkey, $id) {
        global $config, $db, $url;
        $language = $url->pagelang[4];

        $sql = "SELECT
            " . $config['news']['db'] . "." . $config['news']['db'] . "_id as id,
            " . $config['news']['db'] . "." . $config['news']['db'] . "_masterkey as masterkey,
            " . $config['news']['db'] . "." . $config['news']['db'] . "_credate as credate,
            " . $config['news']['db'] . "." . $config['news']['db'] . "_view as view,
            " . $config['news']['db'] . "." . $config['news']['db'] . "_gid as gid,

            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_subject as subject,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_title as title,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_pic as pic,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_htmlfilename as htmlfilename,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_description as description,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_keywords as keywords,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_metatitle as metatitle,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_type as type,
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_url as url

            FROM " . $config['news']['db'] . "
            INNER JOIN " . $config['newsl']['db'] . " ON " . $config['newsl']['db'] . "_cid = " . $config['news']['db'] . "_id
            WHERE
            " . $config['news']['db'] . "." . $config['news']['db'] . "_masterkey = '" . $masterkey . "' AND
            " . $config['newsl']['db'] . "." . $config['newsl']['db'] . "_language = '" . $language . "' AND
            " . $config['news']['db'] . "." . $config['news']['db'] . "_id = '" . intval($id) . "' AND
            " . $config['news']['db'] . "." . $config['news']['db'] . "_status != 'Disable'";

        return $db->execute($sql);
    }
}
