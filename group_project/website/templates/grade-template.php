<div class="fullscreen">
<?php session_start();
require '../classes/tablegenerator.php';
$pdo = new PDO('mysql:dbname=wuc;host=127.0.0.1', 'student', 'student');
if (isset($_SESSION['userinfo']))
{
  //$stmt = find($pdo, 'grades', 'student_id', $_SESSION['userinfo']);

  $stmt = $pdo->prepare('SELECT m.module_title, g.module_id, g.grade1, g.grade2, g.grade3, g.grade1_date, g.grade2_date, g.grade3_date FROM grades g JOIN modules m ON g.module_id = m.module_id WHERE g.student_id = :student_id');
  $criteria =[
    'student_id'=>$_SESSION['userinfo']
  ];
  $stmt->execute($criteria);

  $table = new TableGenerator();
  $table->setHeadings(['Module ', 'Assesment 1 / Date','Assesment 2 / Date','Assesment 3 / Date', 'Overall Grade']);
  $table->setColumnTypes(['td','td','td','td','td']);
  foreach($stmt as $row)
  {
    $percentages = find($pdo, 'modules', 'module_id', $row['module_id']);
    foreach($percentages as $percentage)
    {
      $assesment1 = $percentage['assesment_one_weighting']/100;
      $assesment2 = $percentage['assesment_two_weighting']/100;
      $assesment3 = $percentage['exam_weighting']/100;
    }

    $average = (($row['grade1']*$assesment1) + ($row['grade2']*$assesment2) + ($row['grade3'] *$assesment3));
    if ($average >= 70)
    {
      $grade = 'A';
    }
    else if ($average >= 60)
    {
      $grade = 'B';
    }
    else if ($average >= 50)
    {
      $grade = 'C';
    }
    else if ($average >= 40)
    {
      $grade = 'D';
    }
    else
    {
      $grade = 'F';
    }
    $table->addRow([$row['module_title']." (".$row['module_id'].")", $row['grade1']." ".$row['grade1_date'], $row['grade2']." ".$row['grade2_date'], $row['grade2'], $grade." ".$row['grade3_date']]);
  }
  echo'<h2> Welcome to the Grades Page</h2>';
  echo'<p>This table shall show all grades for modules that a student has available to them on a course they have signed up for.</p>';
  echo'<p>If both a grade and a date is provided both shall be shown. If just a grade is provided only this will be show.</p>';
  echo'<p>Using this table, you can see your overall grade, if only one of the three assignments/exams have been completed, you will be able to see where you would be without submitting anything further</p>';
  echo $table->getHTML();
}
?>
</div>
