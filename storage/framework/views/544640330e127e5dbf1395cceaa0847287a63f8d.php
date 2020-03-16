

  <?php
$today = date("YmdHis");


header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$today.".csv");
header("Content-Transfer-Encoding: binary");


$user = 'root';
$password = '';
$dbName = "myblog";
$host = "localhost";


try {
  $dsn = "mysql:host={$host};dbname={$dbName};charser=utf8";
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
  $sql = "SELECT * from icos";
  $stm = $pdo->prepare($sql);
  $stm->execute();
  $result = $stm->fetchAll(PDO::FETCH_ASSOC);
     
 
  $stm = null;
 
} catch (PDOException $e) { 
  print $e->getMessage() . "<br/gt;";
  die();
}


// $row = '"name","email","password"' . "\n";
$row = '"id","title","body"' . "\n";
foreach ($result as $value ){
   $row .= '"' . $value['id'] . '","' . $value['title'] . '","' . $value['body'] . '",' . "\n";
}

print $row;

return;
?><?php /**PATH /home/vagrant/laravel_lessons_copy/myblog/resources/views/posts/csv.blade.php ENDPATH**/ ?>