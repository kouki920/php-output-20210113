<?php

require_once __DIR__ . '/database/mysqli.php';
require_once __DIR__ . '/lib/xss.php';

function selectSql($link){
    $reviews = [];
    $selectSql = 'SELECT name, image, score, comment FROM ramen';

    $results = mysqli_query($link,$selectSql);

    while($review = mysqli_fetch_assoc($results)){
        $reviews[] = $review;
    }

    mysqli_free_result($results);
    return $reviews;
}

$link = dbConnect();
$reviews = selectSql($link);

$title = '一覧ページ';
$content = __DIR__ . '/views/index.php';

require_once __DIR__ . '/views/html_common.php';
