<?php session_start();?>

<?PHP

if (isset($_SESSION['customer'])) {
    require'../require/after-header.php';
    // header('Location: login_input.blade.php');
    // exit();
} else {
    require'../require/before-header.php';
}?>
<title>ログインページ</title>
<link rel="stylesheet" href="/css/login-about.css">

<div class="form-wrapper">
  <h1>ログイン画面</h1>
  <form action="{{ url('/posts/login_output') }}" method="post">

  {{ csrf_field() }}

    <div class="form-item">
      <label for="email"></label>
      <input type="text" name="email" required="required" placeholder="メールアドレス(test@mail)"></input>
    </div>

    <div class="form-item">
      <label for="password"></label>
      <input type="password" name="password" required="required" placeholder="パスワード(testpass)"></input>
    </div>
    <div class="button-panel">
      <input type="submit" class="button" title="Sign In" value="ログイン"></input>
    </div>
  </form>



  <div class="form-footer">
    <p><a href="https://ico-list.work/posts/customer_input">新規登録</a></p>
    <!-- <p><a href="#">パスワードを忘れた方はこちら</a></p> -->
  </div>
</div>




<?PHP
require'../require/footer.php';
?>
