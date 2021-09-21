<?php
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
  <!-- boootstrapのパッケージ -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- bootstrap icon CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- bootstrap-icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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
<div style="height: 80px;">
    <header class="container-fluid d-flex align-items-center justify-content-betwee fixed-top" style="background: #213a70; color:white">
      <div class="row h-85">
        <div class="col-2 p-0">
          <!-- ハンバーガーイメージ -->
        </div>
        <div class="col-8 d-flex d-flex align-items-center">
          <!-- メッセージ -->
        </div>
        <div class="col-2 p-0">
          <img src="../taion.png" alt="" class="img-fluid">
        </div>
      </div>
    </header>
  </div>
  <!-- ヘッダーend -->

<main class="my-3 mx-auto" style="width: 80%">
  <p class="h2 text-center">today's pick up</3>
  <ul class="p-0 my-4">
    <li>
      <img class="img-fluid rounded-circle m-3" style="width: 120px; height:120px" src="../img/ピック犬.png" alt="">
      <p>まるちゃん(12)</p>
    </li>
    <li>
      <img class="img-fluid rounded-circle m-3" style="width: 120px; height:120px" src="../img/ピック猫.png" alt="">
      <p>たまちゃん(7)</p>
    </li>  
  </ul>

    <form action="login_act.php?s_id=<?= $_GET['s_id'] ?>" method="POST">
      <div class="my-5">
        <p class="m-0">メールアドレス</p>
        <input class="w-100" type="text" name="email">
      </div>
      <div class="my-5">
        <p class="m-0">パスワード</p>
        <input class="w-100" type="password" name="password">
      </div>

      <div class="w-100 text-center my-5">
        <button class="btn btn-primary" type="submit">ログイン</button>
      </div>
    </form>
  </main>

  <footer class="container-fluid text-center fixed-bottom bg-white text-white">
      <div class="row" style="background: #213a70;">
        <div class="d-flex justify-content-between">
          <p class="m-0">利用規約</p>
          <p class="m-0">お問い合わせ</p>
          <p class="m-0">会社概要</p>
        </div>
        <!-- <hr class="m-0"> -->
        <div class="d-flex justify-content-center">
          <i class="bi bi-twitter h1 mx-3"></i>
          <i class="bi bi-facebook h1 mx-3"></i> 
          <i class="bi bi-instagram h1 mx-3"></i>
        </div>
      </div>
      <p class="m-0 text-black">&copy; someday it will disappear company.</p> 
  </footer>

</body>
</html>
