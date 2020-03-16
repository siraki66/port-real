<?php session_start();?>

<?php

unset($_SESSION['customer']);
$pdo=new PDO('mysql:host=localhost;dbname=myblog;charset=utf8','root','');

//ログインできない場合はちゃんとemailで受け取ってる？
$sql=$pdo->prepare('select * from customer where email=? and password=?');

if(!preg_match("/[0-9]+/",$_REQUEST["email"]) ){
    echo "条件通り入力しろやカスがぁ！";
}

// else{
$sql->execute([$_REQUEST['email'], $_REQUEST['password']] );
// echo "ログイン成功しましt。";
// }

foreach($sql->fetchAll() as $row){
$_SESSION['customer']=[

    'id'=>$row['id'], 'name'=>$row['name'],
    'email'=>$row['email'],
       // "login"=>$row["login"],
    'password'=>$row['password'] ];
    
}


if (isset($_SESSION['customer'])){
    echo 'いaaaaらっしゃいませ',$_SESSION['customer'] ['name'],'さん';
    
    header('Location: http://192.168.33.10:8000');
    exit();
}

else{
    echo 'ログイン名またはパスワードが違います';
  
}
?>
<?php /**PATH /home/vagrant/laravel_lessons_copy/myblog/resources/views/posts/login_output.blade.php ENDPATH**/ ?>