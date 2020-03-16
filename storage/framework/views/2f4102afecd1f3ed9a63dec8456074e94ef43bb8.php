<?php session_start();?>

<?PHP
 

if (isset($_SESSION['customer'])) {
    require'../require/after-header.php';
    // header('Location: login_input.blade.php');
    // exit();
} else {
    require'../require/before-header.php';
    //  header('Location: customer_input.blade');
    // exit();
}?>
<link rel="stylesheet" href="css/bootstrap-new.css">


<?php $__env->startSection('title', 'Blog Posts'); ?>

<?php $__env->startSection('content'); ?>
<h1><div class="row"></div>出力結果</h1>

<p>

<?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <li>
    <a href="<?php echo e(action('PostsController@show', $item)); ?>"><?php echo e($item->title); ?></a>
    <a href="<?php echo e(action('PostsController@edit', $item)); ?>" class="edit">[Edit]</a>
    <a href="#" class="del" data-id="<?php echo e($item->id); ?>">[x]</a>
      <form method="post" action="<?php echo e(url('/posts', $item->id)); ?>" id="form_<?php echo e($item->id); ?>">
      <?php echo e(csrf_field()); ?>

      <?php echo e(method_field('delete')); ?>

    </form>
  </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>
</p>



<div class="search-text"> 
   <div class="container">
        <div class="row text-center">
            <div class="form">
                <form action="/search2" method="post" id="search-form" class="form-search form-horizontal">
                <?php echo csrf_field(); ?>
                    <input type="text" name="word" class="input-search" placeholder="ICO名を入力してください">
                    <button type="submit" class="btn-search">Search</button>
                </form>
            </div>
        </div>         
   </div>     
</div>



<?php $__currentLoopData = range('a', 'z'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e(route('posts.az', ['initial' => $i])); ?>"><?php echo e($i); ?></a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</br>
</br>
</br>

 
<?php $__env->stopSection(); ?>


<?php $__env->startSection('test'); ?>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">番号</th>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">ICO名</th>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">編集</th>
      <th scope="col-xs-3 col-sm-6 col-md-3 col-lg-3" class="green">削除</th>
    </tr>
</thead>
<tbody>
 
    
    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
      <th scope="row"><?php echo e($post->id); ?></th>
      <td><a href="<?php echo e(action('PostsController@show', $post)); ?>"><?php echo e($post->title); ?></a></td>
      <td><a href="<?php echo e(action('PostsController@edit', $post)); ?>" class="edit">[Edit]</a></td>
      <td> <a href="#" class="del" data-id="<?php echo e($post->id); ?>">[x]</a>
      <form method="post" action="<?php echo e(url('/posts', $post->id)); ?>" id="form_<?php echo e($post->id); ?>">
      <?php echo e(csrf_field()); ?>

      <?php echo e(method_field('delete')); ?>

    </form>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>
</tbody>
</table>



</div>


<p class="example">
<!-- CSVダウンロード -->
<button><a href="posts/csv" class="button">csvダウンロード<a></button>
</p>


<?PHP
require'../require/footer.php';
?>

<?php $__env->stopSection(); ?>
                    

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/laravel_lessons_copy/myblog/resources/views/posts/az.blade.php ENDPATH**/ ?>