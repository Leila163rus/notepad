<?php
require(__DIR__ . '\..\app\deletePhoto.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
  try {
    require(__DIR__ . '\..\config\pdo.php');
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $email = substr(($_POST['delete']),0,-1);
    $sql = "DELETE FROM form WHERE (email='$email' AND id>0)";
    $pdo->exec($sql);
    echo "<script> 
    alert('Контакт удален.'); 
    window.location.href='../index.php';
    </script>";   
    } catch (PDOException $e) {
      echo "Ошибка при выполнении запроса: " . $e->getMessage();
  } 
}

deletePhoto();
?>
