<?php session_start();?>

<?PHP
// $pdo=new PDO('mysql:host=localhost;dbname=myblog;charset=utf8', 'root', '');

// foreach ($pdo->query('select * from user') as $row){
//   echo $row['id'];
//   echo $row['name'];
//   echo $row['address'];
// }


// unset($_SESSION["customer"]);


if (isset($_SESSION["customer"])){
    echo "いらっしゃいませ",$_SESSION["customer"] ["name"],"さん";
    require"../require/after-header.php"; 
    // header('Location: login_input.blade.php');
    // exit();
}else{
    echo "ログイン名またはパスワードが違います";
    require"../require/before-header.php"; 
}?>
 


  <?php $__env->startSection('title', 'New Post'); ?>

  <?php $__env->startSection('content'); ?>
<h1>
  <!-- <a href="<?php echo e(url('/')); ?>" class="header-menu">Back</a> -->
  ICO追加画面
</h1>



<!-- 画像の実験場 女のアイコンの人-->

<?php if($is_image): ?>
<figure>
    <img src="/storage/profile_images/<?php echo e(Auth::id()); ?>.jpg" width="100px" height="100px">
    <figcaption>現在のプロフィール画像</figcaption>
</figure>
<?php endif; ?>

<form method="POST" action="create" enctype="multipart/form-data" >
    <?php echo e(csrf_field()); ?>






    <p>　//title
    <input type="text" name="title" placeholder="enter title" value="<?php echo e(old('title')); ?>">
    <?php if($errors->has('title')): ?>
    <span class="error"><?php echo e($errors->first('title')); ?></span>
    <?php endif; ?>
  </p>


  <p>　//body
    <textarea name="body" placeholder="enter body"><?php echo e(old('body')); ?></textarea>
    <?php if($errors->has('body')): ?>
    <span class="error"><?php echo e($errors->first('body')); ?></span>
    <?php endif; ?>
  </p>



　//送信ボタン

    <input type="file" name="photo">
    <input type="submit">
  </form>

//エラ〜メッセージ
<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>













<!-- title -->
<form method="post" action="<?php echo e(url('/posts')); ?>">
  <?php echo e(csrf_field()); ?>

  <p>
    <input type="text" name="title" placeholder="enter title" value="<?php echo e(old('title')); ?>">
    <?php if($errors->has('title')): ?>
    <span class="error"><?php echo e($errors->first('title')); ?></span>
    <?php endif; ?>
  </p>

  <!-- body -->
  <p>
    <textarea name="body" placeholder="enter body"><?php echo e(old('body')); ?></textarea>
    <?php if($errors->has('body')): ?>
    <span class="error"><?php echo e($errors->first('body')); ?></span>
    <?php endif; ?>
  </p>
  <a href="<?php echo e(url('/')); ?>" class="back">Back</a>

  <p>
    <input type="submit" value="追加">
  </p>
</form>





  <?php $__env->stopSection(); ?>



















<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/laravel_lessons_copy/myblog/resources/views/posts/create.blade.php ENDPATH**/ ?>