<?php
//funcs.php呼び出す
require_once('funcs.php');

//1.POSTデータ取得
$bookname = $_POST['bookname'];
$author = $_POST['author'];
$bookurl = $_POST['bookurl'];
$comment = $_POST['comment'];

//2.DB接続
$pdo = db_conn();

//3.データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, bookname, author, bookurl, comment, date)
                       VALUES(NULL, :bookname, :author, :bookurl, :comment, sysdate())");

//4.バインド変数を用意
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':author', $author, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//5.実行
$status = $stmt->execute();

//6.データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
//7.index.phpへリダイレクト 処理した後に元の画面に戻る
  header('Location: bm_list_view.php');
}
?>