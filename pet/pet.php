<?php

session_start();
include("../functions.php");
$pdo = connect_to_db();
check_session_id();
$u_id = $_SESSION["u_id"];
$p_id = $_GET["p_id"];

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

$sql = 'SELECT * FROM image_table WHERE p_id=:p_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':p_id', $p_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $image_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($image_data as $record) {
    $output .= "<tr>";
    $output .= "<td><a href='pet_detail.php?i_id={$record['i_id']}'><img src='{$record['image']}' height='100px' alt=''></a></td>";
    $output .= "</tr>";
  }
  unset($value);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ペット個別情報</title>
</head>

<link rel="stylesheet" type="text/css" href="../style.css">

<body>

  <main></main>

  <img src="<?= $pet_data['p_image'] ?>" alt="" height="80" width="80">

  <table>
    <tbody>
      <tr>
        <td>名前</td>
        <td>:</td>
        <td><?= $pet_data['p_name'] ?></td>
      </tr>
      <tr>
        <td>生年月日</td>
        <td>:</td>
        <td><?= $pet_data['birthday'] ?></td>
      </tr>
      <tr>
        <td>性別</td>
        <td>:</td>
        <td><?= $pet_data['sex'] ?></td>
      </tr>
      <tr>
        <td>種類</td>
        <td>:</td>
        <td><?= $pet_data['type'] ?></td>
      </tr>
    </tbody>
  </table>

  <form action="pet_edit.php" method="POST">
    <input type="hidden" name="p_id" value="<?= $pet_data['p_id'] ?>">
    <button type="submit">編集</button>
    <a href="pet_up.php?p_id=<?= $p_id ?>">投稿</a>


  </form>

  <p>↓過去写真一覧を並べる↓</p>
  <table>
    <tbody><?= $output ?></tbody>
  </table>
  <div>
    <a href="../mypage/mypage.php">マイページへ</a>
  </div>

  <footer></footer>
</body>

</html>