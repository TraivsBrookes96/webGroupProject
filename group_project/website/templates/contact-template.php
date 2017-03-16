<div class="fullscreen">
<?php
session_start();
$pdo = new PDO('mysql:dbname=wuc;host=127.0.0.1', 'student', 'student');
if(isset($_SESSION['userinfo']))
{
  $modules = find($pdo, 'course_modules', 'course_id', $_SESSION['course_id']);
  foreach($modules as $row)
  {
    $staffMembers = find($pdo, 'staff_modules', 'module_id', $row['module_id']);
    foreach($staffMembers as $member)
    {
      $staffDetails = find($pdo, 'staff', 'staff_id', $member['staff_id']);
        foreach($staffDetails as $detail)
        {
          if($detail['status'] == 'active')
          {
            echo'
            <div class="module">
            <label>Staff Member: </label>'.$detail['firstname'].' '.$detail['surname'].'<br>
            <label>Email: </label>'.$detail['email_address'].'<br>
            <label>Qualifications: </label>'.$detail['qualification'].'
            </div>';

          }
        }

    }
  }
}

?>
</div>
