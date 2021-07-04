<?php
//1. POSTデータ取得

$name = $_POST["name"];
$score = $_POST["score"];
$sex = $_POST["sex"];
$age = $_POST["age"];
$meeting = $_POST["meeting"];
$mailmaga = $_POST["mailmaga"];
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

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare(
  "UPDATE hage_user_table
  SET
  name = :name,
  score = :score,
  sex = :sex,
  age = :age,
  meeting = :meeting,
  mailmaga = :mailmaga,
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
  WHERE id=:id");

$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':score', $score, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':meeting', $meeting, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mailmaga', $mailmaga, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
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


$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("select.php");
}
?>
