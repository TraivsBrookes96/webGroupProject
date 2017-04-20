<?php
session_start();
require '../database/databaseconnection.php';
?>
<div id="announcments">
  <h2>  Announcements</h2>

  <?php
  $stmt = $pdo->prepare('SELECT a.message, a.title, a.posted_date, a.posted_by, a.module_id
FROM courses c
LEFT JOIN course_modules cm ON c.course_id = cm.course_id
LEFT JOIN modules m on cm.module_id = m.module_id
LEFT JOIN announcements a ON m.module_id = a.module_id
WHERE c.course_id = :course_id
');
  $criteria = [
  	'course_id' => $_SESSION['course_id'],

  ];

  $stmt->execute($criteria);

foreach($stmt as $row){
 ?>
 <div id="announcments-main">
   <?php
    echo '<h4>'.$row['title'].'</h4>';
    echo '<p>'.$row['message'].'</p>';
    ?>
 </div>
 <div id="announcments-main2">
   <?php
    echo '<p> Posted By: '.$row['posted_by'].'</p>';
    echo '<p> Date: '.$row['posted_date'].'</p>';
    echo '<p> Module: '.$row['module_id'].'</p>';
    ?>
 </div>
 <?php
}

   ?>


</div>



<div id="notes">
  <h2>  Notes</h2>
  <p>Students can add notes here for themselves</p>
</div>
<div id="notifications">
  <h2>  Notifications</h2>
</div>
