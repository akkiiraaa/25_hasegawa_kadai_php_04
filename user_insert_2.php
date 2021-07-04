<?php

session_start();

// 1. POSTデータ取得

$height = $_POST["height"];
$weight = $_POST["weight"];
$job = $_POST["job"];
$sleep = $_POST["sleep"];
$work_stress = $_POST["work_stress"];
$other_stress = $_POST["other_stress"];
$food = $_POST["food"];
$food = join(",", $food);
$why = $_POST["why"];
$hope = $_POST["hope"];
$disapp = $_POST["disapp"];
$id = $_POST["id"];


// 2. 関数を呼び出しDB接続
require_once("funcs.php");
$pdo = db_conn();


// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "UPDATE hage_user_table
  SET
  height = :height,
  weight = :weight,
  job = :job,
  sleep = :sleep, 
  work_stress = :work_stress, 
  other_stress = :other_stress, 
  food = :food, 
  why = :why, 
  hope = :hope, 
  disapp = :disapp
  WHERE id=:id"
);

// 4. バインド変数を用意
$stmt->bindValue(':height', $height, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':weight', $weight, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':job', $job, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sleep', $sleep, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':work_stress', $work_stress, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':other_stress', $other_stress, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':food', $food, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':why', $why, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':hope', $hope, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':disapp', $disapp, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
 sql_error($stmt);
}else{
  //５．index.phpへリダイレクト
redirect("end.php");
}

?>