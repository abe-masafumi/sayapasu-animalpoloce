<?PHP

include("../functions.php");
$pdo = connect_to_db();

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

$sql = 'SELECT * FROM contact_table WHERE contact_id=:contact_id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $contact_data = $stmt->fetch(PDO::FETCH_ASSOC);
}


?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせ</title>
</head>
<body>

<h2>お問い合わせ一覧</h2>
        <table>
        <tbody>
          <tr>
            <td>ユーザーID</td>
            <td>:</td>
            <td><?= $user_data['contact_id'] ?></td>
          </tr>
          <tr>
            <td>名前</td>
            <td>:</td>
            <td><?= $user_data['u_name'] ?></td>
          </tr><tr>
            <td>メールアドレス</td>
            <td>:</td>
            <td><?= $user_data['email'] ?></td>
          </tr><tr>
            <td>件名</td>
            <td>:</td>
            <td><?= $contact_data['subject'] ?></td>
          </tr><tr>
            <td>内容</td>
            <td>:</td>
            <td><?= $contact_data['message'] ?></td>
          </tr><tr>
          <td>受付日</td>
            <td>:</td>
            <td><?= $contact_data['created_at'] ?></td>
          </tr>
        </tbody>
      </table>
  
</body>
</html>
