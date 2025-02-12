<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Записная книжка</title>
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
  <?php include "tamplates/menu.php"; ?>
  <?php include "tamplates/form.php"; ?>
  <?php include "tamplates/search.php"; ?>
  <?php include "app/contacts.php"; 
  echo '<div id="contact">';
  foreach($row as $fio) {
    $email = $fio['email'];
    $name = $fio['FIO'];
    $photo = $fio['photo'];
    $date;
    echo '<div>';
    echo '<h3 class="fio">' . $name . '</h3>' . '</n>';
    echo '<hr class="info" size="1">';
    if(!empty($photo)) {
      echo "<image class='info' src='storage/uploads/" . $photo . "'" . " " . "alt=photo>";
    } else {
      echo "<image class='info' src='storage/noPhoto/" . 'no_photo.jpg' . "'" . " " . "alt=photo>";
    }
    if(!empty($fio['birthday'])) {
      $date = date('d.m.y', strtotime($fio["birthday"]));
    } else {
      $date = '';
    }
    echo '<p class="info">' . 'Компания: ' . $fio["Company"] . '</p>';
    echo '<p class="info">' . 'Номер телефона: ' . $fio["phone"] . '</p>';
    echo '<p class="info">' . 'email: ' . $fio["email"] . '</p>';
    echo '<p class="info">' . 'День рождения: ' . $date . '</p>';
    echo '<form class="info" action="/app/delete.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="delete" value=' . $email . '/>
            <input type="submit" value="Удалить контакт">
          </form>';
    echo '</div>';
  }
  for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a id='page' href='index.php?page=" . $i . "'" . ($page == $i ? " class='active'" : "") . ">" . $i . "</a>";
  }
  echo '</div>';
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="/js/main.js"></script>
</body>
</html>