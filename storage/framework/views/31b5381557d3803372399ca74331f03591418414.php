<?php session_start(); ?>

<?php
if (isset($_SESSION['customer'])) {
	unset($_SESSION['customer']);
    echo 'ログアウトしました。';
     header('Location: http://192.168.33.10:8000');
     exit();

} else {
    echo 'すでにログアウトしています。';
    
     header('Location: http://192.168.33.10:8000');
     exit();
}
?>
<?php /**PATH /home/vagrant/laravel_lessons_copy/myblog/resources/views/posts/logout.blade.php ENDPATH**/ ?>