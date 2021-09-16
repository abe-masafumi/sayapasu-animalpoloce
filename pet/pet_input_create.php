<?php

session_start();
include("../functions.php");
$pdo = connect_to_db();
check_session_id();
$u_id = $_SESSION["u_id"];



$p_name = $_POST["p_name"];
$birthday = $_POST["birthday"];
$sex = $_POST["sex"];
$type = $_POST["type"];



$sql = 'INSERT INTO pet_table(p_id, auth_ok, u_id, p_name, birthday, sex, type, alive, p_image, created_at, change_info_at, change_alive_at, deleted_at) VALUES (NULL, :u_id, :p_name, :birthday, :sex, :type, 0, sysdate(), sysdate(), sysdate(), sysdate())';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$stmt->bindValue(':p_name', $p_name, PDO::PARAM_STR);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_INT);
$stmt->bindValue(':type', $type, PDO::PARAM_STR);
$status = $stmt->execute();


if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header('Location:../mypage/mypage.php');
}
