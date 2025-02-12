<div id="form">
  <form id="post" action="/app/post.php" method="POST" enctype="multipart/form-data" autocomplete="on">
    <input type="text" name="fullname" placeholder="ФИО" required autocomplete="on">
    <input type="text" name="company" placeholder="Компания" autocomplete="on">
    <input type="number" name="phone" placeholder="Телефонный номер" required autocomplete="on">
    <input type="email" name="email" placeholder="email" required autocomplete="on">
    <input type="date" name="birthday" placeholder="День рождения">
    <input type="file" name="photo" accept="image/jpeg, image/png">
    <input type="submit" value="Добавить">
  </form>
</div>
