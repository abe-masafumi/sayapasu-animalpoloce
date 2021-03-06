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

<!-- bootstrap-icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<link rel="stylesheet" type="text/css" href="../style.css">
<!-- ハンバーガーメニューの設定 -->
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
          <img src="../oniku.png" alt="ハンバーガーメニュー" class="img-fluid" onclick={openMenue()}>
        </div>
        <div class="col-8 d-flex d-flex align-items-center">今週の写真がありませーん</div>
        <div class="col-2 p-0">
          <img src="../taion.png" alt="ハンバーガーメニュー" class="img-fluid">
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

  <main class="m-auto" style="width: 80%">
    <div class="text-center my-3">
      <img class="img-fluid m-auto rounded-circle" style="width: 90px; height:90px" src="<?= $pet_data['p_image'] ?>" alt="" height="80" width="80">
    </div>
    
    <div class="container my-2">
      <div class="row">
        <table class="col-8">
          <tbody>
            <tr>
              <!-- <td>名前</td>
              <td>:</td> -->
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
        
        <div class="col-4 p-0 text-center">
          <!-- ここ気になる　aタグはformの中にいなくていい -->
          <!-- button　submitもhiddenだけ送るならsessionでいい気がする -->
          <form action="pet_edit.php" method="POST">
            <a class="m-2 p-0 btn btn-secondary w-100 text-white d-flex align-items-center justify-content-center" style="height: 50px;" href="pet_up.php?p_id=<?= $p_id ?>">
            <p class="h3 m-0 px-1">投稿</p>
            <i class="m-0 h1 bi bi-camera"></i>
            </a>
            <input type="hidden" name="p_id" value="<?= $pet_data['p_id'] ?>">
            <button class="m-2 btn btn-primary w-100" type="submit">編集</button>
          </form>
        </div>
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
  <footer class="container-fluid text-center fixed-bottom bg-white text-white">
      <div class="row" style="background: #213a70;">
        <div class="d-flex justify-content-between">
          <p class="m-0">利用規約</p>
          <p class="m-0">お問い合わせ</p>
          <p class="m-0">会社概要</p>
        </div>
        <div class="d-flex justify-content-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-twitter my-2 mx-3" viewBox="0 0 16 16">
          <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-facebook my-2 mx-3" viewBox="0 0 16 16">
          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
          </svg>  
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-instagram my-2 mx-3" viewBox="0 0 16 16">
          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
        </svg>
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