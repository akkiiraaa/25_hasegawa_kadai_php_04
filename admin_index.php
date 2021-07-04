<?php

session_start();
$flg = $_SESSION['kanri_flg']

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chauve.com</title>
    <nav class="nav">
    <div class="container">
      <div class="navbar">
      </div>
    </div>
  </nav>
</head>

<body>
    
    <?php
    
    
    if( $flg == 1 ){
       
       echo '<a href="admin_select.php">'.'ユーザー一覧'.'</a>'.'<br>'.'<br>'.'<a href="logout.php">'.'ログアウト'.'</a>';
    
    } else {

        echo 'あなたは管理者ではありません'.'<br>'.'<br>'.'<a href="logout.php">'.'ログアウト'.'</a>';

    };
    ?>

<style>
    html{
        width: 800px;
        text-align: center;
    }
    .navbar{
        display: flex;
        justify-content:space-around;
    }
    form{
        display: flex;
        flex-direction: column;
        margin: 10px auto 50px auto;
    }
    .btn{
        margin-top: 20px;
    }
</style>


</body>
</html>