<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
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
                    <a class="navbar-brand" href="bm_list_only.php">|　ブックマーク表示</a>
                    <a class="navbar-brand" href="login.php">|　ログイン　]</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="id_insert_new.php">
        <div class="jumbotron">
            <fieldset>
                <legend>新規登録</legend>
                <label>名　　前<input type="text" name="shimei"></label><br>
                <label>年　　齢<input type="int" name="age"></label><br>
                <label>アドレス<input type="text" name="email"></label><br>
                <label>コメント<textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>

</html>
