<?php
session_start();

$username = $_SESSION["name"];


$id = $_SESSION["id"];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chauve.com</title>

    <div class="navbar">
        <p>ようこそ <?= $username ?> さん </p>

    </div>

</head>
<body>

<div class="wrap">

    <p><a href="user_qs.php">アンケートに答える</a></p>
    <p><a href="select.php">登録内容</a></p>
    <p> <a href="logout.php">ログアウト</a></p>

    <!-- <h1>アンケート</h1>
    <p>以下のアンケートにご協力下さい</p>
</div>

<form action="user_insert_2.php" method="POST">
    
    <div>
        <ul>
            <li>身長(cm)：<input type = "number" name = "height" placeholder="数字でご入力ください"></li>
            <li>体重(kg)：<input type = "number" name = "weight" placeholder="数字でご入力ください"></li>
            <li>職業：<input type = "text" name = "job"></li>
        </ul>
    </div>

    <div>
        <ul>
            <li>直近３ヶ月の平均的な睡眠時間を教えてください
                <br><select name="sleep" id="">
                    <option value="3時間以下">3時間以下</option>
                    <option value="4時間">4時間</option>
                    <option value="5時間">5時間</option>
                    <option value="6時間">6時間</option>
                    <option value="7時間">7時間</option>
                    <option value="8h時間以上">8時間以上</option>
                </select>
            </li>
            <li>直近３ヶ月の会社や学校の状況として当てはまるものはどれですか？
                <br><select name="work_stress" id="">
                    <option value="つらい">つらい</option>
                    <option value="普通">普通</option>
                    <option value="充実">充実</option>
                </select>
            </li>
            <li>直近３ヶ月の家庭やプライベートの状況として当てはまるものはどれですか？
                <br><select name="other_stress" id="">
                    <option value="つらい">つらい</option>
                    <option value="普通">普通</option>
                    <option value="充実">充実</option>
                </select>
            </li>
            <li>つぎの食べもののうち好んで食べるものを全て選択してください<br>
                <input type = "checkbox" name = "food[]" value="からあげ">からあげ
                <input type = "checkbox" name = "food[]" value="ハンバーグ">ハンバーグ
                <input type = "checkbox" name = "food[]" value="ステーキ">ステーキ
                <input type = "checkbox" name = "food[]" value="焼肉">焼肉
                <input type = "checkbox" name = "food[]" value="ギョウザ">ギョウザ
                <input type = "checkbox" name = "food[]" value="ラーメン">ラーメン
                <input type = "checkbox" name = "food[]" value="天ぷら">天ぷら
                <br><input type = "checkbox" name = "food[]" value="なし">上記に好きな食べものはない
            </li>
        </ul>
    </div>
    
    <div>
        <ul>
            <li>あなたはなぜこのサービスに登録しようと思ったのですか？：<textarea name="why" id="" cols="30" rows="10"></textarea></li>
            <li>あなたはこのサービスをどのようなサービスだと想像していますか？：<textarea name="hope" id="" cols="30" rows="10"></textarea></li>
            <li>あなたはこのサービスがどのようなサービスだったら失望しますか？：<textarea name="disapp" id="" cols="30" rows="10"></textarea></li>
        </ul>
    </div>

    <input type="hidden" name="id" value="<?=$id?>">

    <div class="btn">
        <input type="submit" value="登録">
    </div>
</form> -->

<style>
    html{
        width: 650px;
   
    }
    .wrap{
        text-align: center;
    }
    .btn{
        text-align: center;
    }
    .navbar{
        display: flex;
        justify-content:space-between;
    }
    textarea{
        width: 100%;
        height: 50px;
    }
    
</style>

</body>
</html>