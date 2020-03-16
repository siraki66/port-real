<?php $__env->startSection('content'); ?>
<form method="post" action="<?php echo e(route('posts.create2')); ?>" enctype="multipart/form-data">
 <?php echo csrf_field(); ?>
       <div class="form">
           <div class="form-title">
             <label for="title">タイトル</label> 
             <input class="" name="title" value="<?php echo e(old('title')); ?>">
           </div>
   
           <div class="form-content">
             <label for="content" class="form-content">内容</label> 
             <textarea class="" name="content" cols="50" rows="10"><?php echo e(old('content')); ?></textarea>        
           </div>
           
           <div class="form-submit">
             <button type="submit">投稿する</button>
           </div>
       </div>
</form>
<?php $__env->stopSection(); ?>

<!-- 画像処理part2 -->
<!-- <div class="form-title">
    <label for="title">タイトル</label> 
    <input class="" name="title" value="<?php echo e(old('title')); ?>">
</div>
   
<div class="form-image_url">
    <input type="file" name="image_url"> 
</div>

<div class="form-content">
    <label for="content" class="form-content">内容</label> 
    <textarea class="" name="content" cols="50" rows="10"><?php echo e(old('content')); ?></textarea>       
</div> -->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/laravel_lessons_copy/myblog/resources/views/posts/create2.blade.php ENDPATH**/ ?>