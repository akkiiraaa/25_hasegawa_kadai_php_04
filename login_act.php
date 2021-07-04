<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値
$lid = $_POST["lid"]; //ID
$lpw = $_POST["lpw"]; //パスワード


//1.  DB接続します
require_once('funcs.php');
$pdo = db_conn();



//2. データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM hage_user_table WHERE lid = :lid "); //*は全てのデータを取得したいとき
$stmt->bindValue(':lid',$lid, PDO::PARAM_STR);  //SQL injectionという攻撃を防ぐためにバインド変数にしている
// $stmt->bindValue(':lpw',$lpw, PDO::PARAM_STR); //* Hash化する場合はコメントアウトする
$status = $stmt->execute();



//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5. 該当レコードがあればSESSIONに値を代入  ->

// if ( $val['id'] != ""){
//* if(password_verify($lpw, $val["lpw"])){
if( password_verify($lpw, $val['lpw']) ){     //hash(暗号)の解読をする関数（第一引数 = 入力された文字列, 第二引数 = 登録されているhash化されたパスワード）
  //Login成功時
  $_SESSION['chk_ssid']  = session_id();//SESSION変数にidを保存
  $_SESSION['kanri_flg'] = $val['kanri_flg'];//SESSION変数に管理者権限のflagを保存
  $_SESSION['name']      = $val['name'];//SESSION変数にnameを保存
  $_SESSION['id']      = $val['id'];//SESSION変数にnameを保存
  redirect('user_index_2.php');
}else{
  //Login失敗時(Logout経由)
  redirect('index.php');
}

exit();

//最初からハッシュ化されていないと、ログインエラーが生じてしまう（例：今回の場合、test1ユーザーのみハッシュ化して、DBを上書きしたが、平文のままのtest2はログインエラーとなる。test2をpassword_varifyしても"test2"にならないため。）

//２段階認証をするとより強固になる（google password generatorなどを使用する）。実プロダクトには必ず実装すること！
