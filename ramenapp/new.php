<?php

require_once __DIR__ . '/lib/xss.php';

$review = [
    'name' => '',
    'image' => '',
    'score' => '',
    'comment' => ''
];

$errors = [];

$title = '登録ページ';
$content = __DIR__ . '/views/new.php';

include __DIR__ . '/views/html_common.php';
