<?php
require(__DIR__ . '\..\app\contacts.php');

function deletePhoto() {
  global $photosRow;
  $sqlPhotos = array_unique(array_merge(...$photosRow));
  $photos = array_slice(scandir(__DIR__ . '\..\storage\uploads'),2);
  $photosDiff = array_diff($photos, $sqlPhotos);
  foreach($photosDiff as $photo) {
    unlink(__DIR__ . '\..\storage\uploads/' . $photo);
  }
}
?>