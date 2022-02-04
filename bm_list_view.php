<?php
// 0. SESSION開始！！
session_start();
//１．関数群の読み込み
require_once("funcs.php");
loginCheck();

//1.DB接続
$pdo = db_conn();


//2.データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//3.データ表示
$view = "";
if ($status == false) {
    sql_error($stmt);

} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="bm_update_view.php?id=' . $result['id'] . '">';
        $view .= h($result['date']) . '【' . h($result['bookname']) . '】' . h($result['author']) . '・著　' . h($result['bookurl']) . '　' . h($result['comment']);
        $view .= '<button type="button" class="btn btn-renew">更新</button>';
        $view .= '</a>';
        // $view .= '</p>';
        $view .= '<a href="bm_delete.php?id=' . $result['id'] . '">';
        $view .= '<button type="button" class="btn btn-danger">削除</button>';
        $view .= '</a>';
        $view .= '<p>';

    }
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックリスト</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">

<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
      
            <div class="navbar-header">
                <a class="navbar-brand" href="bm_regist.php">[　ブックマーク登録</a>
                <a class="navbar-brand" href="bm_list_view.php">|　ブックマーク表示</a>
                <a class="navbar-brand" href="id_regist.php">|　ユーザー登録</a>
                <a class="navbar-brand" href="id_list_view.php">|　ユーザー表示]</a>
                <a class="navbar-brand" href="logout.php">|　ログアウト]</a>
            </div>
        </div>
    </nav>
</header>

<div>
<legend class="title">ブックマーク表示</legend>
    <div class=""><?= $view ?></div>
</div>

</body>
</html>