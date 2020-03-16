

  <?php
$today = date("YmdHis");


header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$today.".csv");
header("Content-Transfer-Encoding: binary");

$user = 'root';
$password = '';
$dbName = "myblog";
$host = "ec2-3-21-31-105.us-east-2.compute.amazonaws.com";


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


$row = '"title","body","image_url"' . "\n";
foreach ($result as $value ){
   $row .= '"' . $value['title'] . '","' . $value['body'] . '","' . $value['image_url'] . '",' . "\n";
  }
  mb_convert_variables("sjis","utf8",$row );

print $row;

return;
?><?php /**PATH /var/www/html/portreal/myblog/resources/views/posts/csv.blade.php ENDPATH**/ ?>