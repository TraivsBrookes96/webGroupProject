<div class="fullscreen">
<?php session_start();
$pdo = new PDO('mysql:dbname=wuc;host=127.0.0.1', 'student', 'student');
if (isset($_SESSION['userinfo']))
{
  $stmt = find($pdo, 'grades', 'student_id', $_SESSION['userinfo']);
}
?>
</div>
