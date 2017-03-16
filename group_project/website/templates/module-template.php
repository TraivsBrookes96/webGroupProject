<div class="fullscreen">
  <?php
  session_start();
  $pdo = new PDO('mysql:dbname=wuc;host=127.0.0.1', 'student', 'student');
  if(isset($_SESSION['userinfo']))
  {
    $stmt1 = find($pdo, 'course_modules', 'course_id', $_SESSION['course_id']);
    foreach($stmt1 as $row)
    {
      $module_id = $row['module_id'];
      $modules = find($pdo, 'modules', 'module_id', $module_id);
      foreach($modules as $module)
      {
        echo'<div class="module">
          <label>Title: </label>'.$module['module_title'].'
          <br>
          <label>Level: </label>'.$module['level'].'
          <br>
          <label>Description: </label>'.$module['module_description'].'
        </div>';
      }
    }
  }


  ?>
</div>
