<?php
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- boootstrapのパッケージ -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>TOP画面</title>
</head>

<body class="text-center">
  <div class="text-center d-inline-block ">
   <div class="m-3"><a class="btn btn-primary stretched-link" href="register/terms.php?s_id=<?= $_GET['s_id'] ?>">新規登録</a></div>
   <div class="m-3"><a class="btn btn-primary stretched-link" href="login/login.php?s_id=<?= $_GET['s_id'] ?>">ログイン</a></div>
  </div>
</body>

</html>