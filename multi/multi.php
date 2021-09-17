<?php
session_start();
include("../functions.php");
$pdo = connect_to_db();
check_session_id();
$u_id = $_SESSION["u_id"];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新しい家族を追加</title>
    <!-- boootstrapのパッケージ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

  <main class="m-auto text-center">
    <p class="m-5">さあ、新しい家族を招待しよう。</p>
    <button class="btn btn-primary">カメラを起動</button> 
    <!-- <input type="file" name="upfile" accept="image/*" capture="camera">
    <a href="../register/pet_input.php?s_id=1">QR疑似コード</a> -->
  </main>

</body>

</html>