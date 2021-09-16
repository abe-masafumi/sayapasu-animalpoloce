<?php

session_start();
include("../functions.php");
$pdo = connect_to_db();
check_session_id();
$u_id = $_SESSION["u_id"];

$p_id = $_POST["p_id"];

$sql = 'SELECT * FROM pet_table WHERE p_id=:p_id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':p_id', $p_id, PDO::PARAM_INT);
  $status = $stmt->execute();
  if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
  } else {
    $pet_data = $stmt->fetch(PDO::FETCH_ASSOC);
  }



?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ペット情報編集</title>

  <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>

<main></main>

      <h2>ペット情報編集</h2>
      <form action="pet_update.php" method="POST" enctype="multipart/form-data">
        <table>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td><input type="file" name="upfile" accept="image/*"capture="camera">
          </td>
          </tr>
          <tr>
            <td>お名前</td>
            <td>:</td>
            <td><input type="text" name="p_name" value="<?= $pet_data['p_name'] ?>"></td>
          </tr>
          
        </tbody>
      </table>
      <input type="hidden" name="p_id" value="<?= $pet_data['p_id'] ?>">
      <button type="submit">保存</button>
      </form>

      <p>変更できるのはアイコン画像と名前のみです。これ以外を変更する場合は「お問い合わせ」から申請してください。</p>
      

      <!-- <p>サービス登録日：<?= $pet_data['created_at'] ?></p> -->

<footer></footer>

</body>
</html>