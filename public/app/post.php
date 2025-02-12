<?php
require(__DIR__ . '\..\config\pdo.php');

function checkExistContact() {
  require(__DIR__ . '\..\config\pdo.php');
  $sql = "SELECT * FROM form WHERE email=?";
  $email = $_POST['email'];
  try {
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare($sql);
    $res->execute([$email]);
    $row = $res->fetch(PDO::FETCH_ASSOC);
    //echo '<br>';
    //var_dump($row);
    if(!empty($row)) {
      echo "<script>
      alert('Такой пользователь уже существует.');
      window.location.href='../index.php';
      </script>";
      return false;
    } else {
      return true;
    }
  } catch (PDOException $e) {
    echo "Ошибка при выполнении запроса: " . $e->getMessage();
  } 
}

if($_SERVER["REQUEST_METHOD"] == "POST" && checkExistContact()) {
  require(__DIR__ . '\..\config\pdo.php');
  $fullname = $_POST['fullname'];
	$company = $_POST['company'];
  $phone = $_POST['phone'];
	$email = $_POST['email'];
  $birthday = $_POST['birthday'];
  $photo = $_FILES['photo']['name'];
  $uploaddir = __DIR__ . '/../storage/uploads/';
  $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
  if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
    echo "Файл не содержит ошибок и успешно загрузился на сервер.\n";
  }
  /*echo '<br>';
  var_dump($_FILES['photo']);
  echo '<br>';*/
  $sql = "INSERT INTO form (FIO, Company, phone, email, birthday, photo) VALUES (:fullname, :company, :phone, :email, :birthday, :photo)";
  try {
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $res = $pdo->prepare($sql);
    $res->execute(['fullname' => $fullname, 'company' => $company, 'phone' => $phone, 'email' => $email, 'birthday' => $birthday, 'photo' => $photo]);
    if(!empty($res)) {
      echo "<script>
      alert('Контакт добавлен.');
      window.location.href='../index.php';
      </script>";
    }
  } catch (PDOException $e) {
    echo "Ошибка при выполнении запроса: " . $e->getMessage();
  }
}
?>