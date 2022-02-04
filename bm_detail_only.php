<?php
//funcs.php呼び出す
require_once('funcs.php');

//1.IDを取得する
$id = $_GET['id'];

//2.DB接続
$pdo = db_conn();

//3.データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//4.データ表示
$view = "";
if ($status == false) {
    sql_error($stmt);

} else {
    $view = $stmt->fetch();
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
                <a class="navbar-brand" href="bm_list_only.php">| ブックマーク一覧</a>
                <a class="navbar-brand" href="login.php">| ログイン　]</a>
            </div>
        </div>
    </nav>
</header>


   
    <div class="">
        <fieldset>
            <legend class="title">詳細画面</legend>
            <label>タイトル　<?= $view['bookname'] ?></label><br>
            <label>著　　者　<?= $view['author'] ?></label><br>
            <label>アドレス　<?= $view['bookurl'] ?></label><br>
            <label>コメント　<?= $view['comment'] ?></label><br>
            <input type="hidden" name="id" value=<?= $view['id'] ?>><br>
        </fieldset>
    </div>
    

    <footer>
        <nav class="">
            <div class="">
                <a class="" href="index.php">トップへ</a>
            </div>
        </nav>
    </footer>


</body>

</html>

