<?php

include("../functions.php");
$pdo = connect_to_db();

$email = $_POST["email"];
$password = $_POST["password"];
$s_id = $_GET['s_id'];

$sql = 'SELECT * FROM users_table WHERE email=:email AND password=:password';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();


if ($status == false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user_data == false) {
        echo "<p>ログインに失敗しました</p>";
        echo '<div><a href="login.php">ログイン</a></div>';
    } else {
        if ($s_id != null && $user_data['u_name'] == null) {
            session_start();
            $_SESSION = array();
            $_SESSION['session_id'] = session_id();
            $_SESSION['u_id'] = $user_data["u_id"];
            $_SESSION['s_id'] = $s_id;
            header("Location:../register/user_input.php");
        } else if ($s_id != null && $user_data['u_name'] != null) {
            session_start();
            $_SESSION = array();
            $_SESSION['session_id'] = session_id();
            $_SESSION['u_id'] = $user_data["u_id"];
            $_SESSION['s_id'] = $s_id;
            header("Location:../register/pet_input.php?s_id={$_GET['s_id']}");
        } else {
            session_start();
            $_SESSION = array();
            $_SESSION['session_id'] = session_id();
            $_SESSION['u_id'] = $user_data["u_id"];
            header('Location:../mypage/mypage.php');
            exit();
        }
    }
}
