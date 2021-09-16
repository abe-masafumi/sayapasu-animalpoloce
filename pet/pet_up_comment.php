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
  <title>コメント入力</title>

  <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>

<main></main>

<img src="<?= $_POST['image'] ?>" alt="" height="100" width="100">
<form action="pet_up_comment_check.php" method="POST">
<input type="hidden" name="p_id" value="<?= $_POST['p_id'] ?>">
<input type="hidden" name="image" value="<?= $_POST['image'] ?>">

<div>
  <p>お悩み相談</p>
  <textarea name="request" rows="4" cols="40" placeholder="飼育方法や、健康状態で気になる事があれば、こちらに入力してください。２〜３営業日以内に、運営よりペットページにアドバイスをお送りさせて頂きます。">
</textarea>
</div>
<button type="submit">確認</button>

</form>

<footer></footer>
  
</body>
</html>