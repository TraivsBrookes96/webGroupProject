<div class="fullscreen">
<?php session_start();
require '../classes/tablegenerator.php';
$pdo = new PDO('mysql:dbname=wuc;host=127.0.0.1', 'student', 'student');
if (isset($_SESSION['userinfo']))
{
  $stmt = find($pdo, 'grades', 'student_id', $_SESSION['userinfo']);

  $table = new TableGenerator();
  $table->setHeadings(['Module ID', 'Assesment 1','Assesment 2','Assesment 3', 'Overall Grade']);
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
    $table->addRow([$row['module_id'], $row['grade1'], $row['grade2'], $row['grade2'], $grade]);
  }

  echo $table->getHTML();
}
?>
</div>
