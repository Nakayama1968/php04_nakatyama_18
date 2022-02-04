<?php
//funcs.php呼び出す
require_once('funcs.php');

//1.POSTデータ取得
$shimei = $_POST['shimei'];
$age = $_POST['age'];
$email = $_POST['email'];
$naiyou = $_POST['naiyou'];

//2.DB接続
$pdo = db_conn();

//3.データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(id, shimei, age, email, naiyou, indate)
                       VALUES(NULL, :shimei, :age, :email, :naiyou, sysdate())");

//4.バインド変数を用意
$stmt->bindValue(':shimei', $shimei, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

//5.実行
$status = $stmt->execute();

//6.データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
//7.index.phpへリダイレクト 処理した後に元の画面に戻る
  header('Location: id_list_view.php');
}
?>