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
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>

  <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>
  <form action="contact_submit.php" method="POST">
  
  <p>お問い合わせ内容</p>
  <select id="subject" name="subject">
    <option value="操作方法">操作方法</option>
    <option value="アカウント情報変更申請">アカウント情報変更申請</option>
    <option value="パスワードを確認">パスワードを確認</option>
    <option value="ペット情報変更申請">ペット情報変更申請</option>
    <option value="その他">その他</option>
  </select>
  
  <textarea name="message" rows="10" cols="40" maxlength="200" placeholder="詳しい内容を200字以内で記入してください。">
</textarea>

<div>
<p>３営業日以内に返信させて頂きます。</p>
</div>
  <div>
  <button type="submit">送信</button>
  </div>
  </form>

  <p>お電話でのお問い合わせはこちら</p>
  <a href="tel:0120-111-222">☎︎0120-111-222</a>

</body>
</html>


