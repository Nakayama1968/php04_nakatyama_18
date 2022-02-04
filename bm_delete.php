<?php
//funcs.php呼び出す
require_once('funcs.php');

//1.POSTデータ取得
$id = $_GET['id'];

//2.DBに接続
$pdo = db_conn();

//3.データ登録SQL作成 SQL文の最後は;を入れる
//　:idなしでテーブルごと削除
$update = $pdo->prepare('DELETE FROM gs_bm_table WHERE id = :id');
$update->bindValue(':id', $id, PDO::PARAM_INT);
$status = $update->execute(); //実行

//4.データ登録処理後
if ($status === false) {
    sql_error($update);
} else {
    // redirect('bm_list_view.php');
    //次のページへリダイレクト
    header("Location: bm_list_view.php");

}
?>
