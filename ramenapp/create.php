<?php
require_once __DIR__ . '/database/mysqli.php';

function createColumn($link,$review){
    $createColumnSql = <<<EOT
    INSERT INTO ramen (
        name,
        image,
        score,
        comment
    ) VALUES (
        "{$review['name']}",
        "{$review['image']}",
        "{$review['score']}",
        "{$review['comment']}"
    )
EOT;

$results = mysqli_query($link,$createColumnSql);

if(!$results){
    echo 'Error fail to create review';
    echo 'Debugging Error:' . mysqli_error($link) . PHP_EOL;
    exit;
}
}



function validate($review){
    $errors = [];

    if(empty($review['name'])){
        $errors['name'] = '店名を入力して下さい';
    } elseif(strlen($review['name']) > 255){
        echo '店名は255文字以内で入力して下さい';
    }

    $fileName = $_FILES['image']['name'];
    //input type="file"でアップロードされたファイル名を変数に代入
    if(!empty($fileName)){
        $ext = substr($fileName,-3);
    if($ext !='jpg' && $ext != 'gif' && $ext !='png'){
        $errors['image'] = '.ipgか.png,gifを選択して下さい';//タイプ違いのエラー
    }
    }elseif(empty($review['image'])){
        $errors['image'] = '写真を選択して下さい';
    }

    if($review['score'] < 0 || $review['score'] > 100){
        echo '1~100の間で評価点を付けて下さい';
    }elseif(empty($review['score'])){
        $errors['score'] = '評価点を入力して下さい';
    }

    if(!strlen($review['comment'])){
        $errors['comment'] = '感想を入力して下さい';
    } elseif(strlen($review['comment']) > 2000){
        $errors['comment'] = '2000文字以内で入力して下さい';
    }

    return $errors;
}


    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $image=date('YmdHis').$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'./images/'.$image);

        $review = [
            'name' => $_POST['name'],
            'image' => $image,
            'score' => $_POST['score'],
            'comment' => $_POST['comment']
        ];
        $errors = validate($review);

        if(!count($errors)){

            $link = dbConnect();
            createColumn($link,$review);
            mysqli_close($link);
            header('Location: index.php');
        }

    }





$title = '登録ページ';
$content = __DIR__ . '/views/new.php';

include __DIR__ . '/views/html_common.php';
