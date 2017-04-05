<?php
session_start();
require '../database/databaseconnection.php';
?>
<div id="announcments">
  <h2>  Announcments</h2>

  <?php
  $stmt = $pdo->prepare('SELECT a.message
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
	echo $row['message'];
}

   ?>


</div>

<div id="adverts">
  <h2>  Adverts</h2>
</div>

<div id="notes">
  <h2>  Notes</h2>
</div>



<div id="notifications">
  <h2>  Notifications</h2>
</div>
