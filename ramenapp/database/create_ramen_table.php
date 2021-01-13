<?php

declare(strict_types=1);

require_once __DIR__ . '/database/mysqli.php';

function createTable($link){
    $createTableSql = <<<EOT
    CREATE TABLE ramen (
        id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
        name VARCHAR(255),
        image VARCHAR(300),
        score INTEGER,
        comment VARCHAR(2000),
        created_at TIMESTAMP NOT NULL DEFAULT
        CURRENT_TIMESTAMP
    ) DEFAULT CHARACTER SET=utf8mb4;
EOT;

    $result = mysqli_query($link,$createTableSql);

    if(!$result){
        echo 'テーブルの作成に失敗しました' . PHP_EOL;
        echo 'Debugging Error:' . mysqli_error($link) . PHP_EOL;
    }else{
        echo 'テーブルの作成に成功しました';
    }

}
$link = dbConnect();
createTable($link);
mysqli_close($link);
