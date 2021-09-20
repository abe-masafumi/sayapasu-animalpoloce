<?php
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>利用規約</title>
  <!-- boootstrapのパッケージ -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- <link rel="stylesheet" type="text/css" href="../style.css"> -->

</head>

<!-- <style>
  h1 {
    margin: 0;
  }

  .desc {
    font-size: 12px;
  }

  .terms {
    width: 300px;
    height: 200px;
    margin-bottom: 10px;
    margin-left: auto;
    margin-right: auto;
    padding: 0.5em;
    overflow-y: scroll;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 12px;
  }
</style> -->

<body class="">
<!-- ヘッダー --> 
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

  <main>
  <!-- <h1>利用規約</h1> -->
  <!-- <p class="desc">
    以下の内容を全てお読み頂き、同意頂ける場合のみ会員登録へお進み下さい。
  </p> -->
  <div class>
    <p class="text-center m-0">お申し込みに関する利用規約</p>
    <div class="m-auto border border-secondary" style="overflow-y: scroll; height:500px; width:85%" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" tabindex="0">
      <strong>第１条</strong><br>
      このアプリに登録した者（以下、会員）は、毎週月曜日〜日曜日の間に該当するペットの写真を投稿する義務を負います。該当するペットとはこのアプリに登録した犬や猫を指します。登録しているペットが複数になった場合は、全てのペットの写真を週に１回投稿してください。<br>
      <strong>第２条</strong><br>
      第１条に違反した場合、警告メッセージが送信されます。投稿が３回滞った時点で、「不適切な飼い主」とみなし当アプリのブラックリストに掲載します。ブラックリストは当アプリを導入している店舗や譲渡会主催者にも共有されます。<br>
      <strong>第３条</strong><br>
      会員またはペットの体調不良などで、やむを得ず投稿を中断する場合は、必ずお問い合わせフォームから申請し、許可を得た上で中断して下さい。その際、診断書などの提出をお願いする場合がありますのでご了承ください。許可なく中断された場合は第２条と同様の措置を取らせて頂きます。
      <strong>第３条</strong><br>
      会員またはペットの体調不良などで、やむを得ず投稿を中断する場合は、必ずお問い合わせフォームから申請し、許可を得た上で中断して下さい。その際、診断書などの提出をお願いする場合がありますのでご了承ください。許可なく中断された場合は第２条と同様の措置を取らせて頂きます。
      <strong>第３条</strong><br>
      会員またはペットの体調不良などで、やむを得ず投稿を中断する場合は、必ずお問い合わせフォームから申請し、許可を得た上で中断して下さい。その際、診断書などの提出をお願いする場合がありますのでご了承ください。許可なく中断された場合は第２条と同様の措置を取らせて頂きます。
      <strong>第３条</strong><br>
      会員またはペットの体調不良などで、やむを得ず投稿を中断する場合は、必ずお問い合わせフォームから申請し、許可を得た上で中断して下さい。その際、診断書などの提出をお願いする場合がありますのでご了承ください。許可なく中断された場合は第２条と同様の措置を取らせて頂きます。
      <div id="end"></div>
    </div>
  </div>

  <div class="text-center my-4">
    <form action="user_input.php?s_id=<?= $_GET['s_id'] ?>" method="POST" class="">
     <p><label class=""><input type="checkbox" name="agreed" value="OK" id="agree" disabled> 利用規約に同意します</label></p>
      <button class="btn btn-primary" id="next" type="submit" disabled>ユーザー登録へ</button>
    </form>
  </div>
  </main>

  <footer class="p-0 container-fluid text-center fixed-bottom bg-white">
      <hr class="my-2" style="border:2px solid #213a70">
      <p class="mb-2 text-black">&copy; someday it will disappear company.</p> 
    </footer>


  <script src="https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>

  <script>
    end = document.getElementById('end');
    var agree = document.getElementById('agree');
    var next = document.getElementById('next');
    agree.addEventListener('click', function() {
      next.disabled = !next.disabled;
    });
    var observer = new IntersectionObserver(function(changes) {
      if (changes[0].intersectionRatio === 1) {
        observer.disconnect();
        agree.disabled = false;
      }
    });
    observer.observe(end);
  </script>

  <footer></footer>

</body>

</html>