<?php
session_start();

require_once('funcs.php');

loginCheck();

$id = $_GET["id"]; //?id~**を受け取る
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM hage_user_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false) {
    sql_error($stmt);
}else{
    $result = $stmt->fetch();
}

$foods = explode(",", $result['food']);


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>登録内容の更新</title>
  <style>
    html{
      width: 750px;
    }
    div{
      padding: 10px;font-size:16px;
      }
    textarea{
        width: 90%;
        height: 50px;
    }
    .btn_wrap{
       text-align: center;
    }
    .btn{
      width: 50%;
    }

  </style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">登録内容確認ページに戻る</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>[編集]</legend>
        <ul>
            <li>氏名：<input type = "text" name = "name" value="<?= $result['name']?>"></li>
            <li>薄毛スコア：<input type = "number" name = "score" value="<?= $result['score']?>" placeholder="1〜100の数字でご入力ください"></li>
            <a href="#">薄毛スコアはここでチェック！</a>
            <li>
                性別：
                <br><input type = "radio" name = "sex" value="男" <?php if($result['sex'] === '男') echo 'checked="checked"' ?>>男
                <br><input type = "radio" name = "sex" value="女" <?php if($result['sex'] === '女') echo 'checked="checked"' ?>>女
                <br><input type = "radio" name = "sex" value="その他" <?php if($result['sex'] === 'その他') echo 'checked="checked"' ?>>その他
            </li>
            <li>年齢：<input type = "number" name = "age" value="<?= $result['age']?>" placeholder="数字でご入力ください"></li>
            <li>マンツーマンの面談によるより専門的なアドバイスを希望しますか？：
                <br><input type = "radio" name = "meeting" value="はい" <?php if($result['meeting'] === 'はい') echo 'checked="checked"' ?>>はい
                <br><input type = "radio" name = "meeting" value="いいえ" <?php if($result['meeting'] === 'いいえ') echo 'checked="checked"' ?>>いいえ
            </li>
            <li>ハゲ調.comからのメルマガ配信を希望しますか？：
                <br><input type = "radio" name = "mailmaga" value="はい" <?php if($result['mailmaga'] === 'はい') echo 'checked="checked"' ?>>はい
                <br><input type = "radio" name = "mailmaga" value="いいえ" <?php if($result['mailmaga'] === 'いいえ') echo 'checked="checked"' ?>>いいえ
            </li>
        </ul>
    

    <div>アンケート
        <ul>
          <li>身長(cm)：<input type = "number" name = "height" value="<?= $result['height']?>" placeholder="数字でご入力ください"></li>
          <li>体重(kg)：<input type = "number" name = "weight" value="<?= $result['weight']?>" placeholder="数字でご入力ください"></li>
          <li>職業：<input type = "text" name = "job" value="<?= $result['job']?>"></li>  
          <li>直近３ヶ月の平均的な睡眠時間を教えてください
            <br><select name="sleep">
                <option value="3時間以下" <?php if( $result['sleep'] === '3時間以下') echo 'selected="true"' ?>>3時間以下</option>
                <option value="4時間"  <?php if( $result['sleep'] === '4時間') echo 'selected="true"' ?>>4時間</option>
                <option value="5時間" <?php if( $result['sleep'] === '5時間') echo 'selected="true"' ?>>5時間</option>
                <option value="6時間" <?php if( $result['sleep'] === '6時間') echo 'selected="true"' ?>>6時間</option>
                <option value="7時間" <?php if( $result['sleep'] === '7時間') echo 'selected="true"' ?>>7時間</option>
                <option value="8時間以上" <?php if( $result['sleep'] === '8時間以上') echo 'selected="true"' ?>>8時間以上</option>
            </select>    
            
            </li>
            <li>直近３ヶ月の会社（学生の方は学校）での状況として当てはまるものはどれですか？
                <br><select name="work_stress" id="">
                    <option value="つらい" <?php if( $result['work_stress'] === 'つらい') echo 'selected="true"' ?>>つらい</option>
                    <option value="普通" <?php if( $result['work_stress'] === '普通') echo 'selected="true"' ?>>普通</option>
                    <option value="充実" <?php if( $result['work_stress'] === '充実') echo 'selected="true"' ?>>充実</option>
                </select>
            </li>
            <li>直近３ヶ月の家庭やプライベートの状況として当てはまるものはどれですか？
                <br><select name="other_stress" id="">
                    <option value="つらい" <?php if( $result['other_stress'] === 'つらい') echo 'selected="true"' ?>>つらい</option>
                    <option value="普通" <?php if( $result['other_stress'] === '普通') echo 'selected="true"' ?>>普通</option>
                    <option value="充実" <?php if( $result['other_stress'] === '充実') echo 'selected="true"' ?>>充実</option>
                </select>
            </li>
            <li>つぎの食べもののうち好んで食べるものを全て選択してください<br>
                <input type = "checkbox" name = "food[]" value="からあげ" <?php if( array_search ( "からあげ" , $foods ) === 0 || array_search ( "からあげ" , $foods ) != false ) echo 'checked="checked"' ?>>からあげ
                <input type = "checkbox" name = "food[]" value="ハンバーグ" <?php if( array_search ( "ハンバーグ" , $foods ) === 0 || array_search ( "ハンバーグ" , $foods ) != false ) echo 'checked="checked"' ?>>ハンバーグ
                <input type = "checkbox" name = "food[]" value="ステーキ" <?php if( array_search ( "ステーキ" , $foods ) === 0 || array_search ( "ステーキ" , $foods ) != false ) echo 'checked="checked"' ?>>ステーキ
                <input type = "checkbox" name = "food[]" value="焼肉" <?php if( array_search ( "焼肉" , $foods ) === 0 || array_search ( "焼肉" , $foods ) != false ) echo 'checked="checked"' ?>>焼肉
                <input type = "checkbox" name = "food[]" value="ギョウザ" <?php if( array_search ( "ギョウザ" , $foods ) === 0 || array_search ( "ギョウザ" , $foods ) != false ) echo 'checked="checked"' ?>>ギョウザ
                <input type = "checkbox" name = "food[]" value="ラーメン" <?php if( array_search ( "ラーメン" , $foods ) === 0 || array_search ( "ラーメン" , $foods ) != false ) echo 'checked="checked"' ?>>ラーメン
                <input type = "checkbox" name = "food[]" value="天ぷら" <?php if( array_search ( "天ぷら" , $foods ) === 0 || array_search ( "天ぷら" , $foods ) != false ) echo 'checked="checked"' ?>>天ぷら
                <br><input type = "checkbox" name = "food[]" value="なし" <?php if( array_search ( "なし" , $foods ) === 0 || array_search ( "なし" , $foods ) != false ) echo 'checked="checked"' ?>>上記に好きな食べものはない
            </li>
            <li>あなたはなぜこのサービスに登録しようと思ったのですか？：<textarea name="why" id="" cols="30" rows="10"><?= $result['why']?></textarea></li>
            <li>あなたはこのサービスをどのようなサービスだと想像していますか？：<textarea name="hope" id="" cols="30" rows="10"><?= $result['hope']?></textarea></li>
            <li>あなたはこのサービスがどのようなサービスだったら失望しますか？：<textarea name="disapp" id="" cols="30" rows="10"><?= $result['disapp']?></textarea></li>
        </ul>
    </div>
      <input type="hidden" name="id" value="<?= $result['id']?>">
      <div class = "btn_wrap">
        <input class="btn" type="submit" value="この内容で更新">
      </div>
  </fieldset>
</div>

</form>
<!-- Main[End] -->


</body>
</html>
