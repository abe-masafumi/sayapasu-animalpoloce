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
  <title>コメント入力</title>
     <!-- bootstrap icon CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
       <!-- bootstrap icon CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<!-- bootstrap-icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>
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
    <div class="text-center">
      <img class="img-fluid mx-auto my-4 rounded-circle" style="width: 90px; height:90px" src="<?= $pet_data['p_image'] ?>" alt="" height="80" width="80">
    </div>

    <form action="pet_up_comment_check.php" method="POST">
      <div class="text-center my-2"> 
        <img src="<?= $_POST['image'] ?>" alt="" width="250" height="250">
        <input type="hidden" name="p_id" value="<?= $_POST['p_id'] ?>">
        <input type="hidden" name="image" value="<?= $_POST['image'] ?>">
      </div>
      <div class="m-auto" style="width: 80%;">
        <p class="m-0">お悩み相談</p>
        <textarea name="request" rows="4" cols="36" placeholder="飼育方法や、健康状態で気になる事があれば、こちらに入力してください。２〜３営業日以内に、運営よりペットページにアドバイスをお送りさせて頂きます。">
        </textarea>
      </div>
      <div class="text-center my-4">
        <button class="m-auto btn btn-primary text-white w-50" type="submit">投稿する</button>
      </div>
      <!-- <div class="d-flex justify-content-center">
        <a class="m-5 btn btn-primary text-white w-50" href="pet_up.php?p_id=<?= $_POST['p_id'] ?>">撮り直す</a>
        <button class="m-5 btn btn-primary text-white w-50" type="submit">OK</button>
      </div> -->
    </form>

<!-- <img src="<?= $_POST['image'] ?>" alt="" height="100" width="100"> -->
<!-- <form action="pet_up_comment_check.php" method="POST">
<input type="hidden" name="p_id" value="<?= $_POST['p_id'] ?>">
<input type="hidden" name="image" value="<?= $_POST['image'] ?>">

<div>
  <p>お悩み相談</p>
  <textarea name="request" rows="4" cols="40" placeholder="飼育方法や、健康状態で気になる事があれば、こちらに入力してください。２〜３営業日以内に、運営よりペットページにアドバイスをお送りさせて頂きます。">
</textarea>
</div>
<button type="submit">確認</button>

</form> -->

</main>
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