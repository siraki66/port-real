<?php session_start(); ?>

<?php
if (isset($_SESSION['customer'])) {
	unset($_SESSION['customer']);
    echo 'ログアウトしました。';
     header('Location: https://ico-list.work/');
     exit();

} else {
    echo 'すでにログアウトしています。';
    
     header('Location: https://ico-list.work/');
     exit();
}
?>
<?php /**PATH /var/www/html/portreal/myblog/resources/views/posts/logout.blade.php ENDPATH**/ ?>