<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chauve.com</title>
</head>
<body>

<div class="wrap">
    <h1>会員登録</h1>
    <p>入力内容は第三者には開示されません</p>
</div>

<form action="user_insert.php" method="POST">
    
    <div>
        <div class="wrap">
            <p>基本情報</p>
        </div>
        <ul>
            <li>氏名：<input type = "text" name = "name"></li>
            <li>薄毛スコア：<input type = "number" name = "score" placeholder="1〜100の数字でご入力ください"></li>
            <a href="https://mil1st08.sakura.ne.jp/25_hasegawa/js04/hage_detector.html">薄毛スコアはここでチェック！</a>
            <li>
                性別：
                <br><input type = "radio" name = "sex" value = "男">男
                <br><input type = "radio" name = "sex" value = "女">女
                <br><input type = "radio" name = "sex" value = "その他">その他
            </li>
            <li>年齢：<input type = "number" name = "age" placeholder="数字でご入力ください"></li>
            <!-- <li>身長(cm)：<input type = "number" name = "height" placeholder="数字でご入力ください"></li>
            <li>体重(kg)：<input type = "number" name = "weight" placeholder="数字でご入力ください"></li>
            <li>職業：<input type = "text" name = "job"></li> -->
            <li>メールアドレス：<input type = "text" name = "lid"></li>
            <li>パスワード：<input type = "password" name = "lpw"></li>
        </ul>
    </div>
<!-- 
    <div>生活習慣
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
            <li>直近３ヶ月の会社（学生の方は学校）での状況として当てはまるものはどれですか？
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
    </div> -->

    <div>
        <div class="wrap">
            <p>その他</p>
        </div>
        <ul>
            <li>マンツーマンの面談によるより専門的なアドバイスを希望しますか？：
                <br><input type = "radio" name = "meeting" value="はい">はい
                <br><input type = "radio" name = "meeting" value="いいえ">いいえ
            </li>
            <li>ハゲ調.comからのメルマガ配信を希望しますか？：
                <br><input type = "radio" name = "mailmaga" value="はい">はい
                <br><input type = "radio" name = "mailmaga" value="いいえ">いいえ
            </li>
        </ul>
    </div>
    <div class="btn">
        <input type="submit" value="登録">
    </div>
</form>

<style>
    html{
        width: 600px;
   
    }
    .wrap{
        text-align: center;
    }
    .btn{
        text-align: center;
    }
    
</style>

</body>
</html>