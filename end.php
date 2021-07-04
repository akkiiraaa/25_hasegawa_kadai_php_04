<?php
session_start();

$username = $_SESSION["name"];


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
        <p> <a href="logout.php">ログアウト</a></p>
    </div>

</head>
<body>
<div class="wrap">

    <h1>ご協力ありがとうございました！サービスのローンチをお楽しみに！</h1>
</div>


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
