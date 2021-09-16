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
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイアカウント情報</title>

  <link rel="stylesheet" type="text/css" href="../style.css">

</head>
<body>

<main></main>

      <h2>マイアカウント情報</h2>
      <table>
        <tbody>
          <tr>
            <td>お名前</td>
            <td>:</td>
            <td><?= $user_data['u_name'] ?></td>
          </tr>
          <tr>
            <td>メールアドレス</td>
            <td>:</td>
            <td><?= $user_data['email'] ?></td>
          </tr><tr>
            <td>住所</td>
            <td>:</td>
            <td><?= $user_data['address'] ?></td>
          </tr><tr>
            <td>電話番号</td>
            <td>:</td>
            <td><?= $user_data['phone'] ?></td>
          </tr>
        </tbody>
      </table>
  <div>
    <p>※アカウント情報を変更するには、審査が必要です。<br>お問い合わせページから申請してください。</p>
  </div>


<footer></footer>

</body>
</html>