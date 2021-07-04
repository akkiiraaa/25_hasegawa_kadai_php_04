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
      <a href="logout.php">ログアウト</a>
      </div>
    </div>
  </nav>
</head>

<body>
    <h1>chauve.com</h1>
    <h2>ハゲ頭で勝負しよう</h2>
    <p>chauveはハゲを意味するフランス語です<br>（たぶん）</p>
    
    
    <form name="form1" action="login_act.php" method="post">
        ログイン
        <div> ID:<input type="text" name="lid" /></div>
        <div> PW:<input type="password" name="lpw" /></div>
        <div><input class = "btn" type="submit" value="LOGIN" /></div>
    </form>

    <a href="user_index.php">無料会員登録はコチラ</a>
    <div class = "admin">
        <a href="admin_login.php">管理者ログイン</a>
    </div>
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
    .admin{
        margin-top: 120px;
    }
</style>


</body>
</html>