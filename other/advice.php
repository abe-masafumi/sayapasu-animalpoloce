<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>飼育方法アドバイス</title>
   <!-- bootstrap icon CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- bootstrap icon CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<!-- bootstrap-icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- <link rel="stylesheet" type="text/css" href="../style.css"> -->
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
</head>

<body>
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

  <main class="m-auto" style="width: 97%;">
    <div class="text-center m-5">
      <p>獣医師・トレーナー監修<br>
      ワンポイントアドバイス</p>
    </div>

    <div>
      <p class="m-0">Q：食べさせてはいけない物は？</p>
      <div class="bg-warning d-flex rounded p-2 my-2">
        <img src="../taion.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">玉ねぎ、ネギ類、ニンニク、ぶどう、キシリトール、チョコレート、カフェイン、鶏の骨、甲殻類、イカ、牛乳。青魚やマグロも長期間与え続けると「黄色脂肪症」という病気になる恐れがありますので注意してください。</p>
      </div>
      <div class="bg-danger d-flex rounded p-2 my-2">
      <img src="../taion.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">玉ねぎ、ネギ類、ニンニク、ぶどう、キシリトール、チョコレート、カフェイン、鶏の骨、甲殻類、イカ、牛乳。猫ちゃんは魚好きと思われがちですが、犬と同じように青魚やマグロを長期間食べ続けると病気になる恐れがあります。</p>
      </div>
    </div>
    
    <div>
      <p class="m-0">Q：散歩の時間はどのくらいが理想？</p>
      <div class="bg-warning d-flex rounded p-2 my-2">
        <img src="../taion.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">犬種、体格、年齢によって異なりますが一般的には小型犬20分、中型犬30分、大型犬30〜60分をそれぞれ１日２回（熱中症を防ぐために早朝、涼しくなった夕方以降）が望ましいです。食後は胃捻転や胃拡張のリスクがあるため食前または食後1〜2時間経過後に行きましょう。</p>
      </div>
      <div class="bg-danger d-flex rounded p-2 my-2">
      <img src="../taion.png" alt="体温" style="width: 50px; height:50px">
        <p class="m-0" style="padding-left: 3px;">お家の中に遊べる環境があれば散歩は必要ありません。犬と違って猫にとって外は危険がいっぱいです。どうしても気晴らしで連れて行ってあげたいという場合には、リードではなくハーネスを着けて脱走しないように細心の注意を払って短時間で行うようにしましょう。</p>
      </div>
    </div>

    <!-- <div class="advice">
      <div class="advice_question">
        <p>Q：散歩の時間はどのくらいが理想？</p>
      </div>
      <div class="advice_dog">
        <p>犬種、体格、年齢によって異なりますが一般的には小型犬20分、中型犬30分、大型犬30〜60分をそれぞれ１日２回（熱中症を防ぐために早朝、涼しくなった夕方以降）が望ましいです。食後は胃捻転や胃拡張のリスクがあるため食前または食後1〜2時間経過後に行きましょう。</p>
      </div>
      <div class="advice_cat">
        <p>お家の中に遊べる環境があれば散歩は必要ありません。犬と違って猫にとって外は危険がいっぱいです。どうしても気晴らしで連れて行ってあげたいという場合には、リードではなくハーネスを着けて脱走しないように細心の注意を払って短時間で行うようにしましょう。
        </p>
      </div>
    </div> -->
    <div class="advice">
      <div class="advice_question">
        <p>Q：トイレトレーニングの方法</p>
      </div>
      <div class="advice_dog">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </div>
      <div class="advice_cat">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      </div>
    </div>
    <div class="advice">
      <div class="advice_question">
        <p>Q：ワクチンって必要なの？</p>
      </div>
      <div class="advice_dog">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </div>
      <div class="advice_cat">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      </div>
    </div>
    <div class="advice">
      <div class="advice_question">
        <p>Q：かかりつけ医の見付け方</p>
      </div>
      <div class="advice_dog">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </div>
      <div class="advice_cat">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      </div>
    </div>
    <div class="advice">
      <div class="advice_question">
        <p>Q：休日や夜間に体調が急変したら？</p>
      </div>
      <div class="advice_dog">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </div>
      <div class="advice_cat">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      </div>
    </div>
    <div class="advice">
      <div class="advice_question">
        <p>Q：かかりやすい病気</p>
      </div>
      <div class="advice_dog">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </div>
      <div class="advice_cat">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      </div>
    </div>
    <div class="advice">
      <div class="advice_question">
        <p>Q：ストレスが溜まっている時に見せる行動</p>
      </div>
      <div class="advice_dog">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </div>
      <div class="advice_cat">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      </div>
    </div>
    <div class="advice">
      <div class="advice_question">
        <p>Q：ちゃんと信頼してくれてるかな？</p>
      </div>
      <div class="advice_dog">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </div>
      <div class="advice_cat">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      </div>
    </div>
    <div class="advice">
      <div class="advice_question">
        <p>Q：お留守番させるときに気をつける事</p>
      </div>
      <div class="advice_dog">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </div>
      <div class="advice_cat">
        <p>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      </div>
    </div>
  </main>


  <!-- <a href="../mypage/mypage.php">マイページへ</a> -->
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