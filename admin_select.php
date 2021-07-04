<?php
//SESSIONスタート
session_start();

//関数を呼び出す
require_once('funcs.php');

//ログインチェック
loginCheck();
$user_name = $_SESSION['name'];
$id = $_SESSION['id'];

//以下ログインユーザーのみ

$pdo = db_conn();
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM hage_user_table");
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
  sql_error($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<p>";
    $view .= '<a href ="detail.php?id='.$result["id"].'">';  //<a>タグで囲う(update用)
    $view .= h($result['indate']).':'
             .h($result["name"]).":"
             .h($result["score"]).":"
             .h($result["sex"]).":"
             .h($result["age"]).":"
             .h($result["height"]).":"
             .h($result["weight"]).":"
             .h($result["job"]).":"
             .h($result["mail"]).":"
             .h($result["sleep"]).":"
             .h($result["work_stress"]).":"
             .h($result["other_stress"]).":"
             .h($result["food"]).":"
             .h($result["meeting"]).":"
             .h($result["mailmaga"]).":"
             .h($result["why"]).":"
             .h($result["hope"]).":"
             .h($result["disapp"]);
    $view .= "</a>";
    $view .= '<a href = "delete.php?id='.$result["id"].'">';  //<a>タグで囲う(delete用)
    $view .= " " . "[登録削除]";
    $view .= "</a>";
    $view .= "</p>";
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー一覧</title>
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="admin_index.php">管理者トップページに戻る</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
  <p><?= "ユーザー一覧" ?></p>
  <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
