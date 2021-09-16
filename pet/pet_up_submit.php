<?php

session_start();
include("../functions.php");
$pdo = connect_to_db();
check_session_id();
$u_id = $_SESSION["u_id"];
$p_id = $_POST['p_id'];
$request = $_POST['request'];
$image = $_POST['image'];



$sql = 'INSERT INTO image_table(i_id, u_id, p_id, image, request, response, r_created_at, created_at, updated_at, deleted_at) VALUES (:i_id, :u_id, :p_id, :image, :request, :response, sysdate(), sysdate(), sysdate(),sysdate())';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':i_id', $i_id, PDO::PARAM_INT);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$stmt->bindValue(':p_id', $p_id, PDO::PARAM_INT);
$stmt->bindValue(':image', $image, PDO::PARAM_STR);
$stmt->bindValue(':request', $request, PDO::PARAM_STR);
$stmt->bindValue(':response', $response, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
  // } else {
  //   header ('Location:../mypage/mypage.php');
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿完了</title>

  <link rel="stylesheet" type="text/css" href="../style.css">

</head>

<body>

  <main></main>

  <p>投稿が完了しました</p>

  <a href="../mypage/mypage.php">マイページ</a>

  <footer></footer>

</body>

</html>