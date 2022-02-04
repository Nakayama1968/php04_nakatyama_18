<?php
//funcs.php呼び出す
require_once('funcs.php');

//1.POSTデータ取得
$bookname = $_POST['bookname'];
$author = $_POST['author'];
$bookurl = $_POST['bookurl'];
$comment = $_POST['comment'];
$id = $_POST['id'];

//2.DB接続
$pdo = db_conn();

//3.SQL作成
$update = $pdo->prepare('UPDATE
                        gs_bm_table
                        SET
                        bookname = :bookname,
                        author = :author,
                        bookurl = :bookurl,
                        comment = :comment,
                        date = sysdate()
                        WHERE
                        id = :id;
                        ');


//数値の場合 PDO::PARMA_INT
//文字の場合 PDO::PARMA_STR
$update->bindValue(':bookname', $bookname, PDO::PARAM_STR);
$update->bindValue(':author', $author, PDO::PARAM_STR);
$update->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);
$update->bindValue(':comment', $comment, PDO::PARAM_STR);
$update->bindValue(':id', $id, PDO::PARAM_INT);
$status = $update->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($update);
} else {
    header('Location: bm_list_view.php');
}

?>