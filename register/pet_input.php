<?php
include("../functions.php");
$pdo = connect_to_db();
$s_id = $_GET['s_id'];

$sql = 'SELECT * FROM store_table WHERE s_id=:s_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':s_id', $s_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $store_data = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録ペット情報入力</title>
    <!-- boootstrapのパッケージ -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

<div style="height: 80px;">
    <header class="container-fluid d-flex align-items-center justify-content-betwee fixed-top" style="background: #213a70; color:white">
      <div class="row h-85">
        <div class="col-2 p-0">
        </div>
        <div class="col-8 d-flex d-flex align-items-center"></div>
        <div class="col-2 p-0">
          <img src="../taion.png" alt="" class="img-fluid">
        </div>
      </div>
    </header>
  </div>
  <!-- ヘッダーend -->

  <div class="mx-auto my-4" style="width: 80%">
    <form action="shop_check.php?s_id=<?= $_GET['s_id'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
      <div class="my-3">
        <p class="m-0">購入店舗</p>
        <p class="h3 text-center"><?= $store_data['store_name'] ?></p>
      </div>
      <p class="m-0">ペットのお名前</p>
      <input class="w-100" type="text" name="p_name">
      <p class="text-danger pl-3" style="font-size: 14px;">※まだ決まっていない場合は、登録後に変更できますので空欄で構いません</p>
      <div class="d-flex">
        <div class="mr-2">
          <p class="m-0">犬種</p>
          <input class="w-100" type="text" name="d_type">
        </div>
        <div class="ml-2">
          <p class="m-0">猫種</p>
          <input class="w-100" type="text" name="c_type">
        </div>
      </div>

      <div class="my-3">
        <p class="m-0">ペットの性別</p>
        <select name="sex">
          <option value="">-</option>
          <option value="男の子">男の子</option>
          <option value="女の子">女の子</option>
        </select>
      </div>

      <div class="my-3">
        <p class="m-0">ペットの生年月日</p>
        <select name="birthday_y">
          <option value="">----</option>
          <option value="2005年">2005</option>
          <option value="2006年">2006</option>
          <option value="2007年">2007</option>
          <option value="2008年">2008</option>
          <option value="2009年">2009</option>
          <option value="2010年">2010</option>
          <option value="2011年">2011</option>
          <option value="2012年">2012</option>
          <option value="2013年">2013</option>
          <option value="2014年">2014</option>
          <option value="2015年">2015</option>
          <option value="2016年">2016</option>
          <option value="2017年">2017</option>
          <option value="2018年">2018</option>
          <option value="2019年">2019</option>
          <option value="2020年">2020</option>
          <option value="2021年">2021</option>
          <option value="2022年">2022</option>
          <option value="2023年">2023</option>
        </select>
        年
        <select name="birthday_m">
          <option value="">--</option>
          <option value="01月">01</option>
          <option value="02月">02</option>
          <option value="03月">03</option>
          <option value="04月">04</option>
          <option value="05月">05</option>
          <option value="06月">06</option>
          <option value="07月">07</option>
          <option value="08月">08</option>
          <option value="09月">09</option>
          <option value="10月">10</option>
          <option value="11月">11</option>
          <option value="12月">12</option>
        </select>
        月
        <select name="birthday_d">
          <option value="">--</option>
          <option value="01日">01</option>
          <option value="02日">02</option>
          <option value="03日">03</option>
          <option value="04日">04</option>
          <option value="05日">05</option>
          <option value="06日">06</option>
          <option value="07日">07</option>
          <option value="08日">08</option>
          <option value="09日">09</option>
          <option value="10日">10</option>
          <option value="11日">11</option>
          <option value="12日">12</option>
          <option value="13日">13</option>
          <option value="14日">14</option>
          <option value="15日">15</option>
          <option value="16日">16</option>
          <option value="17日">17</option>
          <option value="18日">18</option>
          <option value="19日">19</option>
          <option value="20日">20</option>
          <option value="21日">21</option>
          <option value="22日">22</option>
          <option value="23日">23</option>
          <option value="24日">24</option>
          <option value="25日">25</option>
          <option value="26日">26</option>
          <option value="27日">27</option>
          <option value="28日">28</option>
          <option value="29日">29</option>
          <option value="30日">30</option>
          <option value="31日">31</option>
        </select>
        日
      </div>

      <input type="hidden" name="u_name" value="<?= $_POST['u_name'] ?>">
      <input type="hidden" name="都道府県" value="<?= $_POST['都道府県'] ?>">
      <input type="hidden" name="市区町村" value="<?= $_POST['市区町村'] ?>">
      <input type="hidden" name="番地" value="<?= $_POST['番地'] ?>">
      <input type="hidden" name="建物名・部屋番号" value="<?= $_POST['建物名・部屋番号'] ?>">
      <input type="hidden" name="phone1" value="<?= $_POST['phone1'] ?>">
      <input type="hidden" name="phone2" value="<?= $_POST['phone2'] ?>">
      <input type="hidden" name="phone3" value="<?= $_POST['phone3'] ?>">
      <input type="hidden" name="email" value="<?= $_POST['email'] ?>">
      <input type="hidden" name="password" value="<?= $_POST['password'] ?>">
      <input type="hidden" name="s_id" value="<?= $s_id ?>">

      <div class="my-4">
        <p class="m-0">ペットの写真</p>
        <input type="file" name="upfile" accept="image/*" capture="camera">
      </div>

      <div>
        <div class="w-100 text-center my-5">
          <button class="btn btn-primary w-50" type="submit">確認</button>
        </div>
      </div>
    </form>
  </div>

 
  <footer class="p-0 container-fluid text-center fixed-bottom bg-white">
      <hr class="my-2" style="border:2px solid #213a70">
      <p class="mb-2 text-black">&copy; someday it will disappear company.</p> 
    </footer>

</body>

</html>