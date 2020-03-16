<?php session_start();?>

<?PHP

if (isset($_SESSION["customer"])){
    require"../require/after-header.php"; 
    // header('Location: login_input.blade.php');
    // exit();
}else{
    require"../require/before-header.php"; 
}?>



<?php $__env->startSection('title', 'Edit Post'); ?>

<?php $__env->startSection('content'); ?>
<h1>
   <div class="container">
      <div class="row o-3column">
        <div class="col-md-4">
  更新画面
</h1>

<form method="post" action="<?php echo e(url('/posts', $ico->id)); ?>">
  <?php echo e(csrf_field()); ?>

  <?php echo e(method_field('patch')); ?>

  <p>
    <input type="text" name="title" placeholder="ICO名" value="<?php echo e(old('title', $ico->title)); ?>">
    <?php if($errors->has('title')): ?>
    <span class="error"><?php echo e($errors->first('title')); ?></span>
    <?php endif; ?>
  </p>

  <p>
    <textarea name="body" placeholder="内容"><?php echo e(old('body', $ico->body)); ?></textarea>
    <?php if($errors->has('body')): ?>
    <span class="error"><?php echo e($errors->first('body')); ?></span>
    <?php endif; ?>
  </p>

  <a href="<?php echo e(url('/')); ?>" class="back">Back</a>

  <p><input type="submit" value="更新"></p>
</form>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('test'); ?>

<?PHP
require'../require/footer.php';
?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/laravel_lessons_copy/myblog/resources/views/posts/edit.blade.php ENDPATH**/ ?>