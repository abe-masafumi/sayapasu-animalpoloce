<?php

session_start();
include("../functions.php");
$pdo = connect_to_db();
check_session_id();
$u_id = $_SESSION["u_id"];

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

$sql = 'SELECT * FROM pet_table WHERE u_id=:u_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
    $pets_data = $stmt->fetch(PDO::FETCH_ASSOC);
    
    date_default_timezone_set('Asia/Tokyo');
    $this_Mon = date("m/d", strtotime("this week Monday"));
    $this_Sun = date("m/d", strtotime("this week Sunday"));
    echo ("今週の投稿期間は" . $this_Mon . "〜" . $this_Sun . "です<br>");
    
    $limit = date("Y-m-d", strtotime("last week sunday"));

    $sql = 'SELECT * FROM image_table WHERE created_at < :limit';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_STR);
    $status = $stmt->execute();
    $image_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($image_data as $record);
    $date = $record['created_at'];

    var_dump($date);
   


    // var_dump("created_atの日付" . $date);
    // var_dump("前回の日曜日" . $limit);

    if ($limit < $date) {
        echo("今週の投稿は完了しています");
    } else {
        echo("今週はまだ投稿が完了していません");
    }
}



$sql = 'SELECT * FROM pet_table WHERE u_id=:u_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $pets_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $output = "";
  foreach ($pets_data as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["p_name"]}</td>";
    $output .= "<td>
    <a href='../pet/pet.php?p_id={$record["p_id"]}'><img src='{$record["p_image"]}' width='100' height='100'></a>
                </td>";
    $output .= "</tr>";
  }
  unset($value);
}

$sql = 'SELECT * FROM image_table WHERE u_id=:u_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
    $image_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $past = "";
    foreach ($image_data as $record) {
        $past .= "<tr>";
        $past .= "<td><a href='../pet/pet_detail.php?i_id={$record['i_id']}'><img src='{$record['image']}' height='100px' alt=''></a></td>";
        $past .= "</tr>";
    }
}





?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ</title>

  <link rel="stylesheet" type="text/css" href="../style.css">

</head>

<body>
  <main></main>
  <p><?= $user_data['u_name'] ?>さん！こんにちは</p>

  <table>
    <tbody>
      <?= $output ?>
    </tbody>
    <tbody>
      <?= $past ?>
    </tbody>
  </table>

  <div>
    <a href="../other/account.php">アカウント情報</a>
  </div>
  <div>

  </div>
  <div>
    <a href="../other/advice.php">飼育方法アドバイス</a>
  </div>
  <div>
    <a href="../multi/multi.php">新しい家族を追加</a>
  </div>
  <div>
    <a href="../other/contact.php">お問い合わせ</a>
  </div>
  <div>
    <a href="../other/logout.php">ログアウト</a>
  </div>



</body>

<footer>

</footer>

</html>