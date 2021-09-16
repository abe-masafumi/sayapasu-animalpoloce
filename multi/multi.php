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
</head>

<body>

  <p>さあ、新しい家族を招待しよう。</p>
  <input type="file" name="upfile" accept="image/*" capture="camera">
  <a href="../register/pet_input.php?s_id=1">QR疑似コード</a>
</body>

</html>