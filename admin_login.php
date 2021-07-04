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
      <a href="index.php">トップページへ戻る</a>
      </div>
    </div>
  </nav>
</head>

<body>
    <h1>chauve.com</h1>
    <h2>管理者ログイン</h2>
    
    <form name="form1" action="admin_login_act.php" method="post">
        <div> ID:<input type="text" name="lid" /></div>
        <div> PW:<input type="password" name="lpw" /></div>
        <div><input class = "btn" type="submit" value="LOGIN" /></div>
    </form>

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