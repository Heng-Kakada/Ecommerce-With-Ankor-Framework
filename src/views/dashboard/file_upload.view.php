<?php
include __DIR__ . '/components/head.php';
include __DIR__ . '/upload.php';
?>

<form method="post" action="/admin/upload" enctype="multipart/form-data">
  <div class="form-group">
    <label><b>Select File:</b></label>
    <input type="file" name="userfile" class="form-control" required>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="submit" value="Upload">
  </div>
</form>

<?php

//include ('components/footer.php');
include __DIR__ . '/components/foot.php';
?>