<?php session_start();?>

<?PHP
 

if (isset($_SESSION["customer"])){
    require"../require/after-header.php"; 
    // header('Location: login_input.blade.php');
    // exit();
}else{
    require"../require/before-header.php"; 
}?>




<?php $__env->startSection('title', $ico->title); ?>




<?php $__env->startSection('content'); ?>
 
<img class="logo" src="../storage/profile_images/<?php echo e($ico->id); ?>.jpg" alt="logo">



</br>
</br>
</br>

<h1>

<?php echo e($ico->title); ?>

</h1>
<p><?php echo nl2br(e($ico->body)); ?></p>

<h2>コメント</h2>

<ul>
  <?php $__empty_1 = true; $__currentLoopData = $ico->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <li>
    <?php echo e($comment->body); ?>

    <!-- <a href="#" class="del" data-id="<?php echo e($comment->id); ?>">[x]</a>
   <form method="post" action="<?php echo e(action('CommentsController@destroy', [$ico, $comment])); ?>" id="form_<?php echo e($comment->id); ?>">
     <?php echo e(csrf_field()); ?>

     <?php echo e(method_field('delete')); ?>

   </form> -->
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
  <?php endif; ?>
</ul>



<form method="post" action="<?php echo e(action('CommentsController@store', $ico)); ?>">
  <?php echo e(csrf_field()); ?>

  <p>
    <input type="text" name="body" placeholder="スキャム理由" value="<?php echo e(old('body')); ?>">
    <?php if($errors->has('body')): ?>
    <span class="error"><?php echo e($errors->first('body')); ?></span>
    <?php endif; ?>
  </p>
  <p>
    <input type="submit" value="投稿">
    <a href="<?php echo e(url('/')); ?>" class="back">Back</a>
  </p>
</form>



<script src="/js/main.js"></script>

 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('test'); ?>

<?PHP
require'../require/footer.php';
?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/laravel_lessons_copy/myblog/resources/views/posts/show.blade.php ENDPATH**/ ?>