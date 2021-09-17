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
   <!-- bootstrap icon CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<link rel="stylesheet" type="text/css" href="../style.css">

<body>

  <main class="m-auto" style="width: 80%">
    <div class="text-center">
      <img class="img-fluid m-auto rounded-circle" style="width: 90px; height:90px" src="<?= $pet_data['p_image'] ?>" alt="" height="80" width="80">
    </div>
    <div class="d-flex">
      <div>
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
      </div>
      <div>
        <form action="pet_edit.php" method="POST">
          <div><a href="pet_up.php?p_id=<?= $p_id ?>">投稿</a></div>
          <input type="hidden" name="p_id" value="<?= $pet_data['p_id'] ?>">
          <button class="btn btn-primary" type="submit">編集</button>
        </form>
      </div>
    </div>
<!-- <a href='pet_detail.php?i_id={$record['i_id']}'><img src='{$record['image']}' height='100px' alt=''> -->
    <!-- <p>↓過去写真一覧を並べる↓</p> -->
<div class="container-fluid">
  <div class="row">
  <?php foreach ($image_data as $record): ?>
    <div class="col-3 p-0">
      <a href="pet_detail.php?i_id=<?= $record['i_id'] ?>">
      <img class="img-fluid" style="width: 80px; height:80px" src=<?= $record['image'] ?> alt="まだ">
      </a>
    </div>
  <?php endforeach ?>
    <!-- <div class="col-3 p-0">
      <img src="../upload/20210831114254b8b178582dc357af581d064142f58bf6.png" alt="まだ" class="img-fluid" >
    </div> -->
  </div>
</div>
    <!-- <div>
      <a href="../mypage/mypage.php">マイページへ</a>
    </div> -->
  </main>
  <footer></footer>
</body>

</html>