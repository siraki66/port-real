<?php session_start();?>

<?PHP
if (isset($_SESSION['customer'])) {
    require'../require/after-header.php';
    // header('Location: login_input.blade.php');
    // exit();
} else {
    require'../require/before-header.php';
}?>

<!DOCTYPE html>

<html lang="ja">
　<head>
        
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
        
  <title>ログインページ</title>

 </head>
   
　<link rel="stylesheet" href="/css/login-about.css">


 <div class="form-wrapper">
 <h1>登録画面</h1>

 <form action="<?php echo e(url('/posts/customer_output')); ?>" method="post">
 <table>
 <?php echo e(csrf_field()); ?>

 <div class="form-item">
 <input type="email" name="email" required="required" placeholder="メールアドレス">
 </td></tr>
 </div>


 <div class="form-item">
 <input type="text" name="name" required="required" placeholder="名前">
 </td></tr>
 </div>

 <div class="form-item">
 <input type="password" name="password" required="required" placeholder="パスワード">
 </td></tr>
 </div>
 
 </table>

<div class="button-panel">
<input type="submit" class="button" title="Sign In" value="登録"></input>
</div>
</form>

<div class="form-footer">
<p><a href="https://ico-list.work/posts/login">ログインはこちら</a></p>

</div>
</div>

 

 </form>

 </div>

<?PHP
 require'../require/footer.php';
?>








<?php /**PATH /home/vagrant/laravel_lessons_copy/myblog/resources/views/posts/customer_input.blade.php ENDPATH**/ ?>