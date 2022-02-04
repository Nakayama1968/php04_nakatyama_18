<?php
//funcs.php呼び出す
require_once('funcs.php');

//1.IDを取得する
$id = $_GET['id'];

//2.DB接続
$pdo = db_conn();

//3.データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_an_table WHERE id = :id');
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ更新</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="style.css">
    <style>
        div {
            padding: 10px;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <header>
    <nav class="">
            <div class="">
                <div class=""><a class="" href="id_list_view.php">ブックリストへ</a></div>
                
            </div>
        </nav>
    </header>


    <form action="id_update.php" method="POST">
        <div class="">
            <fieldset>
                <legend class="title">更新画面</legend>
                <label>氏　　名<input type="text" name="shimei" value=<?= $view['shimei'] ?>></label><br>
                <label>年　　齢<input type="int" name="age" value=<?= $view['age'] ?>></label><br>
                <label>アドレス<input type="text" name="email" value=<?= $view['email'] ?>></label><br>
                <label>コメント<textArea name="naiyou" rows="4" cols="40"><?= $view['naiyou'] ?></textArea></label><br>
                <input type="hidden" name="id" value=<?= $view['id'] ?>><br>
                <input type="submit" value="保存">
            </fieldset>
        </div>
    </form>

    <footer>
        <nav class="">
            <div class="">
                <a class="" href="index.php">ブック登録</a></div>
            </div>
        </nav>
    </footer>


</body>

</html>

