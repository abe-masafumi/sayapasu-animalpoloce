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
     <!-- bootstrap icon CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<!-- bootstrap-icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- <link rel="stylesheet" type="text/css" href="../style.css"> -->

</head>
<style>
  .mask {
  background: rgba(0, 0, 0, 0.5);
	position: fixed;
	top: 0;
	bottom: 0;
	right: 0;
	left: 0;
	z-index: 5;
  }
  .none {
    display: none;
  }
</style>
<body>
<!-- マスク -->
<div id="mask" class="mask none"></div>
  <!-- ヘッダー --> 
  <div style="height: 80px;">
    <header class="container-fluid d-flex align-items-center justify-content-betwee fixed-top" style="background: #213a70; color:white">
      <div class="row h-85">
        <div class="col-2 p-0">
          <img src="../肉球白.png" alt="ハンバーガーメニュー" class="img-fluid" onclick={openMenue()}>
        </div>
        <div class="col-8 d-flex d-flex align-items-center">今週の写真がありませーん</div>
        <div class="col-2 p-0">
          <img src="../taion.png" alt="" class="img-fluid">
        </div>
      </div>
    </header>
    <!-- ハンバーガーメニュー -->
    <div id="menue" class="rounded" style="z-index:10; height: 225px; width:180px; background:#F5E2DB; position:fixed; top:70px; left:10px; display:none;">
      <div class="m-3">
        <a style="color: #934497;" href="../other/account.php">アカウント情報</a>
      </div>
      <div>
      </div>
      <div class="m-3">
        <a style="color: pink;" href="../other/advice.php">飼育方法アドバイス</a>
      </div>
      <div class="m-3">
        <a style="color: gray;" href="../multi/multi.php">新しい家族を追加</a>
      </div>
      <div class="m-3">
        <a style="color: orange;" href="../other/contact.php">お問い合わせ</a>
      </div>
      <div class="m-3">
        <a style="color: white" href="../other/logout.php">ログアウト</a>
      </div>
    </div>
  </div>
  <!-- ヘッダーend -->

<main>
    <!-- ペットのアイコン -->
    <div class="text-center my-2">
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

<footer class="container-fluid text-center fixed-bottom bg-white text-white">
      <div class="row" style="background: #213a70;">
        <div class="d-flex justify-content-between">
          <p class="m-0">利用規約</p>
          <p class="m-0">お問い合わせ</p>
          <p class="m-0">会社概要</p>
        </div>
        <!-- <hr class="m-0"> -->
        <div class="d-flex justify-content-center">
          <i class="bi bi-twitter h1 mx-3"></i>
          <i class="bi bi-facebook h1 mx-3"></i> 
          <i class="bi bi-instagram h1 mx-3"></i>
        </div>
      </div>
      <p class="m-0 text-black">&copy; someday it will disappear company.</p> 
    </footer>
<script>
  const mask = document.getElementById('mask');
  function openMenue() {
    const menue = document.getElementById('menue');
      if (menue.style.display == "none") {
        menue.style.display = "inline-block"
        mask.classList.remove("none");
        } else {
        menue.style.display = "none";
        mask.classList.add('none');
        } 
      };
  mask.addEventListener('click', () => {
    openMenue();
  });
</script>
</body>
</html>