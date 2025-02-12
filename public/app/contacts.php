<?php
require(__DIR__ . '\..\config\pdo.php');
$row;
$photosRow;
$pdo = new PDO($dsn, $user, $pass, $opt);
$user = $pdo->query("SELECT COUNT(*) FROM form");
$rowsCount = $user->fetchColumn(); 
$perPage = 6;      
$totalPages = ceil($rowsCount / $perPage);
try {
  if(isset($_GET['page'])) {
    $page=$_GET['page'];
  } else {
    $page=1;
  }
  $offset = ($page - 1) * $perPage;
  $res = $pdo->prepare("SELECT * FROM form ORDER BY FIO ASC LIMIT :perPage OFFSET :offset");
  //$resPhoto = $pdo->prepare("SELECT photo FROM form");
  $resPhoto = $pdo->prepare("SELECT photo FROM form WHERE photo > ''");
  $res->execute([':perPage' => $perPage, ':offset' => $offset]);
  $resPhoto->execute();
  $row = $res->fetchAll();
  $photosRow = $resPhoto->fetchAll(PDO::FETCH_NUM);
} catch (PDOException $e) {
  echo "Ошибка при выполнении запроса: " . $e->getMessage();
}
?>