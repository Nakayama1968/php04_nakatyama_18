<?php
//funcs.php呼び出す
require_once('funcs.php');

//1.POSTデータ取得
$shimei = $_POST['shimei'];
$age = $_POST['age'];
$email = $_POST['email'];
$naiyou = $_POST['naiyou'];
$id = $_POST['id'];

//2.DB接続
$pdo = db_conn();

//3.SQL作成
$update = $pdo->prepare('UPDATE
                        gs_an_table
                        SET
                        shimei = :shimei,
                        age = :age,
                        email = :email,
                        naiyou = :naiyou,
                        indate = sysdate()
                        WHERE
                        id = :id;
                        ');


//数値の場合 PDO::PARMA_INT
//文字の場合 PDO::PARMA_STR
$update->bindValue(':shimei', $shimei, PDO::PARAM_STR);
$update->bindValue(':age', $age, PDO::PARAM_INT);
$update->bindValue(':email', $email, PDO::PARAM_STR);
$update->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$update->bindValue(':id', $id, PDO::PARAM_INT);
$status = $update->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($update);
} else {
    header('Location: id_list_view.php');
}

?>