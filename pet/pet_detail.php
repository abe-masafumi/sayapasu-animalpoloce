<?php

session_start();
include("../functions.php");
$pdo = connect_to_db();
check_session_id();

$i_id = $_GET['i_id'];

$sql = 'SELECT * FROM image_table WHERE i_id=:i_id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':i_id', $i_id, PDO::PARAM_INT);
  $status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $image_data = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>過去の写真</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<main class="m-auto" style="width: 80%;">
  <div class="text-center">
    <img src="<?= $image_data['image'] ?>" alt="" width="200" height="200">
  <p>投稿日:<?= $image_data['created_at'] ?></p>

  </div>
  <div>
    <p>相談内容</p>
    <p><?= $image_data['request'] ?></p>
  </div>
  <div>
    <p>お返事</p>
  <p><?= $image_data['response'] ?></p>
  </div>
  <div>
 
  </div>
  <a href="pet.php?p_id=<?= $image_data['p_id'] ?>">戻る</a>
</main>
<footer></footer>

</body>
</html>