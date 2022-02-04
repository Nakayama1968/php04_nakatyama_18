<?php
// 0. SESSION開始！！
session_start();
//１．関数群の読み込み
require_once("funcs.php");
loginCheck();
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
                    <a class="navbar-brand" href="bm_regist.php">[ ブックマーク登録</a>
                    <a class="navbar-brand" href="bm_list_view.php">| ブックマーク表示</a>
                    <a class="navbar-brand" href="id_regist.php">| ユーザー登録</a>
                    <a class="navbar-brand" href="id_list_view.php">| ユーザー表示]</a>
                    <a class="navbar-brand" href="logout.php">| ログアウト]</a>
                </div>
            </div>
        </nav>
    </header>
    <form action="bm_insert.php" method="POST">
        <div class="jumbotron">
            <div class="form-inner">
                <legend class="title">ブックマーク登録</legend>
                <div class="form-title">タイトル</div>
                    <div class="form-item"><input type="text" name="bookname" class="form-parts"></div>
                <div class="form-title">著　　者</div>
                    <div class="form-item"><input type="text" name="author" class="form-parts"></div>
                <div class="form-title">アドレス</div>
                    <div class="form-item"><textArea name="bookurl" rows="2" cols="40" class="form-parts2"></textArea></div>
                <div class="form-title">コメント</div>
                    <div class="form-item"><textArea name="comment" rows="4" cols="40" class="form-parts2"></textArea></div>
                <input type="submit" value="送信" class="btn">
            </fieldset>
        </div> 
    </form>
    
</body>
</html>