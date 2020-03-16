<?php session_start(); ?>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=myblog;charset=utf8',
    'root', '');

if (isset($_SESSION['customer'])) {
    $id = $_SESSION['customer']['id'];
    $sql = $pdo->prepare('select * from customer where id!=? and email=?');
    $sql->execute([$id, $_REQUEST['email']]);
} else {
    $sql = $pdo->prepare('select * from customer where email=?');
    $sql->execute([$_REQUEST['email']]);
}

if (empty($sql->fetchAll())) {
    if (isset($_SESSION['customer'])) {
        $sql = $pdo->prepare('update customer set name=?, email=?, '.
            ' password=? where id=?');
        $sql->execute([
            $_REQUEST['name'],
            $_REQUEST['email'], $_REQUEST['password'], $id, ]);
        $_SESSION['customer'] = [
            'id' => $id, 'name' => $_REQUEST['name'],
             'email' => $_REQUEST['email'],
            'password' => $_REQUEST['password'], ];
        echo 'お客様情報を更新しました。';
        header('Location: https://ico-list.work/');
        exit();
    } else {
        $sql = $pdo->prepare('insert into customer values(null,?,?,?)');
        $sql->execute([
            $_REQUEST['name'],$_REQUEST['email'],
            $_REQUEST['password'], ]);
        echo 'お客様情報を登録しました。';
        header('Location: https://ico-list.work/');
        exit();
    }
} else {
    echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>



