<?php

include("../functions.php");
$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table WHERE u_id=:u_id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
  $status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
}


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

date_default_timezone_set('Asia/Tokyo');


  $limit = date("Y-m-d 23:59:59", strtotime("last week sunday"));
  $submit_day = $image_data['created_at'];

if ($limit > $submit_day) {
    $violater = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($violater);
    // exit();
}

?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>違反者</title>
</head>
<body>

<h2>違反者一覧</h2>
        <table>
        <tbody>
          <tr>
            <td>ユーザーID</td>
            <td>:</td>
            <td><?= $user_data['contact_id'] ?></td>
          </tr>
          <tr>
            <td>名前</td>
            <td>:</td>
            <td><?= $user_data['u_name'] ?></td>
          </tr><tr>
            <td>メールアドレス</td>
            <td>:</td>
            <td><?= $user_data['email'] ?></td>
          </tr><tr>
            <td>前回の投稿日</td>
            <td>:</td>
            <td><?= $image_data['created_at'] ?></td>
          </tr>
        </tbody>
      </table>

  
</body>
</html>