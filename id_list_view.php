<?php
// 0. SESSION開始！！
session_start();
//１．関数群の読み込み
require_once("funcs.php");
loginCheck();

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($stmt);
} else {
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="id_detail.php?id=' . $r["id"] . '">';
        $view .= $r["id"] . " " . $r["shimei"] . " " . $r["email"] . "【" . $r["naiyou"]. "】";
        $view .= '</a>';
        $view .= "　";
        $view .= '<a href="id_detail.php?id=' . $r["id"] . '">';
        $view .= '<button type="button" class="btn btn-renew">[更新]</button>';
        $view .= '</a>';
        $view .= "　";
        $view .= '<a class="btn btn-danger" href="id_delete.php?id=' . $r["id"] . '">';
        $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="bm_regist.php">[ ブックマーク登録</a>
                    <a class="navbar-brand" href="bm_list_view.php">| ブックマーク表示</a>
                    <a class="navbar-brand" href="id_regist.php">| ユーザー登録</a>
                    <a class="navbar-brand" href="id_list_view.php">| ユーザー表示]</a>
                    <a class="navbar-brand" href="logout.php">| ログアウト]</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
    <legend class="title">ユーザー表示</legend>
        <?= $view ?>
    </div>
    <!-- Main[End] -->

</body>

</html>