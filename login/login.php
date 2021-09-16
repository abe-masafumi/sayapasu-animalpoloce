<?php
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>

  <link rel="stylesheet" type="text/css" href="../style.css">

  <style>
    ul{
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-align-items: center;
    align-items: center;
    height: 200px;
    list-style: none;
    }
  </style>

</head>

<body>

<main></main>



<h3>今週のピックアップ</3>
<ul>
  <li>
  <img src="../img/ピック犬.png" alt="" height="150px">
  <p>まるちゃん(12)</p>
  </li>
  <li>
  <img src="../img/ピック猫.png" alt="" height="150px">
  <p>たまちゃん(7)</p>
  </li>  
</ul>

<form action="login_act.php?s_id=<?= $_GET['s_id'] ?>" method="POST">
    <p>メールアドレス</p>
    <input type="text" name="email">
    <p>パスワード</p>
    <input type="password" name="password">
    <div>
      <button type="submit">ログイン</button>
    </div>
  </form>

<footer></footer>

</body>
</html>
