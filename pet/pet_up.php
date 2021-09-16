<?php
session_start();
include("../functions.php");
$pdo = connect_to_db();
check_session_id();
$u_id = $_SESSION["u_id"];
$p_id = $_POST['p_id'];

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿ページ</title>

  <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>

<main></main>

<form action="pet_up_check.php" method="POST" enctype="multipart/form-data">
<input type="file" name="upfile" accept="image/*"capture="camera">
<input type="hidden" name="p_id" value="<?= $_GET['p_id'] ?>">
<button type="submit">確認</button>
</form>

<footer></footer>

</body>
</html>
