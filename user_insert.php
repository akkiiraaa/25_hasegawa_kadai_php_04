<?php

// 1. POSTデータ取得

$name = $_POST["name"];
$score = $_POST["score"];
$sex = $_POST["sex"];
$age = $_POST["age"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$hlpw = password_hash($lpw, PASSWORD_DEFAULT);

$meeting = $_POST["meeting"];
$mailmaga = $_POST["mailmaga"];


// 2. 関数を呼び出しDB接続
require_once("funcs.php");
$pdo = db_conn();



// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO hage_user_table (id, indate, name, score, sex, age, lid, lpw, meeting, mailmaga, kanri_flg)
  VALUES( NULL,  sysdate(), :name, :score, :sex, :age, :lid, :lpw, :meeting, :mailmaga, 0)"
);


// 4. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':score', $score, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $hlpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':meeting', $meeting, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mailmaga', $mailmaga, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
 sql_error($stmt);
}else{
  //５．index.phpへリダイレクト
redirect("index.php");
}

?>