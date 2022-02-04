<?php
session_start();
require_once("funcs.php");
loginCheck();

$id = $_GET["id"]; //?id~**を受け取る
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブック登録</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}
</style>
</head>
<body id="main">
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="bm_regist.php">[　ブックマーク登録</a>
                    <a class="navbar-brand" href="bm_list_view.php">|　ブックマーク表示</a>
                    <a class="navbar-brand" href="id_regist.php">|　ユーザー登録</a>
                    <a class="navbar-brand" href="id_list_view.php">|　ユーザー表示</a>
                    <a class="navbar-brand" href="logout.php">|　ログアウト]</a>
                </div>
            </div>
        </nav>
    </header>

    <form method="POST" action="id_update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>更新画面</legend>
                <label>名　　前<input type="text" name="shimei" value="<?= $row["shimei"] ?>"></label><br>
                <label>年　　齢<input type="int" name="age" value="<?= $row["age"] ?>"></label><br>
                <label>アドレス<input type="text" name="email" value="<?= $row["email"] ?>"></label><br>
                <label><textArea name="naiyou" rows="4" cols="40"><?= $row["naiyou"] ?></textArea></label><br>
                <input type="submit" value="送信">
                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
