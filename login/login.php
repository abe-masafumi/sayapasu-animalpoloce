<?php
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- <link rel="stylesheet" type="text/css" href="../style.css"> -->

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

<main class="m-auto" style="width: 80%">
  <h3>今週のピックアップ</3>
  <ul>
    <li>
    <img class="img-fluid m-auto rounded-circle" style="width: 90px; height:90px" src="../img/ピック犬.png" alt="" height="150px">
    <p>まるちゃん(12)</p>
    </li>
    <li>
    <img class="img-fluid m-auto rounded-circle" style="width: 90px; height:90px" src="../img/ピック猫.png" alt="" height="150px">
    <p>たまちゃん(7)</p>
    </li>  
  </ul>

  <form action="login_act.php?s_id=<?= $_GET['s_id'] ?>" method="POST">
      <p>メールアドレス</p>
      <input type="text" name="email">
      <p>パスワード</p>
      <input type="password" name="password">

      <div class="w-100 text-center mt-5">
        <button class="btn btn-primary" type="submit">ログイン</button>
      </div>
    </form>
  </main>
<footer></footer>

</body>
</html>
