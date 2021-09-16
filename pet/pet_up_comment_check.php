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
  <title>コメント確認</title>

  <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>

<main></main>

<p>投稿内容確認</p>
<img src="<?= $_POST['image'] ?>" alt="" height="100" width="100">

<p>お悩み相談</p>
<?= $_POST['request'] ?>

<form action="pet_up_comment.php" method="POST">
<input type="hidden" name="image" value="<?= $_POST['image'] ?>">
<input type="hidden" name="request" value="<?= $_POST['request'] ?>">
<input type="hidden" name="p_id" value="<?= $_POST['p_id'] ?>">
<button type="submit">戻る</button>
</form>

<form action="pet_up_submit.php" method="POST">
<input type="hidden" name="image" value="<?= $_POST['image'] ?>">
<input type="hidden" name="request" value="<?= $_POST['request'] ?>">
<input type="hidden" name="p_id" value="<?= $_POST['p_id'] ?>">
<button type="submit">投稿</button>
</form>
  
<footer></footer>

</body>
</html>
