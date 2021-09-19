# さやパスの卒制,bootstrap実装

# bootstrapリンク
```js
//    <!-- bootstrap icon CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
```

> bootstrap参考資料document:https://getbootstrap.com/docs/4.1/getting-started/introduction/  

# 上下中央
```js
// 親要素に指定すると子要素は上下中央になる
class="container bg-primary d-flex align-items-center"
```

# 上下左右中央

```js
class="d-flex align-items-center justify-content-center"
```

# image
```js
// img-fluidは画像をレスポンシブにする
//  max-width: 100%; , height: auto; を適用すると親要素に比例するレスポンシブが実現出来ます。
// 例:
    <img src="../abetter_rogo.png" alt="ハンバーガーメニュー" class="img-fluid max-width: 100% height: auto" width="60" height="auto"> 
```

# container-fluid
> 画面いっぱい（width）  

# icon
> https://icons.getbootstrap.com/?

```js
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
```

# justify-content
> https://getbootstrap.jp/docs/4.2/utilities/flex/

# background
> https://getbootstrap.jp/docs/4.1/utilities/colors/
```js
class="bg-primary"
```
# font
> https://getbootstrap.jp/docs/5.0/utilities/text/

# size
> https://getbootstrap.jp/docs/4.1/utilities/sizing/

# Border-radius
> https://getbootstrap.jp/docs/4.2/utilities/borders/
```js
class="rounded"
class="rounded-circle"
class="rounded-pill"
```
