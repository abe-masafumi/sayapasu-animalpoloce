<?php

session_start();
include("../functions.php");
check_session_id();
$u_id = $_SESSION["u_id"];


if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
  $uploaded_file_name = $_FILES['upfile']['name']; //ファイル名を取得
  $temp_path = $_FILES['upfile']['tmp_name']; //tmpフォルダの場所
  $directory_path = '../upload/'; //アップロード先ォルダ(自分で決める)
  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
  $filename_to_save = $directory_path . $unique_name;
  if (is_uploaded_file($temp_path)) {

    if (move_uploaded_file($temp_path, $filename_to_save)) {
      chmod($filename_to_save, 0644);
    } else {
      exit('ERROR:アップロードできませんでした');
    }
  } else {
    exit('ERROR:画像がありません');
  }
} else {
  exit('error:画像が送信されていません');
}


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>写真確認</title>
   <!-- bootstrap icon CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>

<main>
    <!-- ペットのアイコン -->
    <div class="text-center my-3">
      <img class="img-fluid mx-auto my-4 rounded-circle" style="width: 90px; height:90px" src="<?= $pet_data['p_image'] ?>" alt="" height="80" width="80">
    </div>
    <!-- トリミング情報 -->
    <form action="pet_up_comment.php" method="POST">
    <div class="text-center"> 
      <p>このトリミングでよろしいですか？</p>
      <img src="<?= $filename_to_save ?>" alt="" width="300" height="300">
      <input type="hidden" name="image" value="<?= $filename_to_save ?>">
      <input type="hidden" name="p_id" value="<?= $_POST['p_id'] ?>">
    </div>
    <div class="d-flex justify-content-center">
      <a class="m-5 btn btn-primary text-white w-50" href="pet_up.php?p_id=<?= $_POST['p_id'] ?>">撮り直す</a>
      <button class="m-5 btn btn-primary text-white w-50" type="submit">OK</button>
    </div>
    </form>

</main>

<!-- <form action="pet_up_comment.php" method="POST">
<p>このトリミングでよろしいですか？</p>
<img src="<?= $filename_to_save ?>" alt="" width="100" height="100">
<input type="hidden" name="image" value="<?= $filename_to_save ?>">
<input type="hidden" name="p_id" value="<?= $_POST['p_id'] ?>">
<div>
  <a href="pet_up.php?p_id=<?= $_POST['p_id'] ?>">撮り直す</a>
  <button type="submit">OK</button>
</div>

<div>
  
</div>
</form> -->

<footer></footer>

</body>
</html>