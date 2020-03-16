
<?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
  <li>
    <a href="#"><?php echo e($item->title); ?></a>
 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>


<?php /**PATH /home/vagrant/laravel_lessons_copy/myblog/resources/views/posts/test.blade.php ENDPATH**/ ?>