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

  <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>

<main>
      <!-- ペットのアイコン -->
    <div class="text-center my-3">
      <img class="img-fluid mx-auto my-4 rounded-circle" style="width: 90px; height:90px" src="<?= $pet_data['p_image'] ?>" alt="" height="80" width="80">
    </div>

    <form action="pet_up_comment_check.php" method="POST">
      <div class="text-center my-4"> 
        <img src="<?= $_POST['image'] ?>" alt="" width="300" height="300">
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
<footer></footer>
  
</body>
</html>