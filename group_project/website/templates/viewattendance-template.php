<div class="fullscreen">

  <?php
    $pdo = new PDO('mysql:dbname=wuc;host=127.0.0.1', 'student', 'student');
    session_start();
    if(isset($_SESSION['userinfo']))
    {
      $lessons = find($pdo, 'register', 'student_id', $_SESSION['userinfo']);
      $total = 0;
      $attended = 0;
      $authabsent = 0;
      $absent = 0;
      $late = 0;
      foreach($lessons as $record)
      {
        if($record['attended'] == 'X')
        {
          $absent += 1;
        }
        else if($record['attended'] == 'O')
        {
          $attended += 1;
        }
        else if($record['attended'] == 'A')
        {
          $authabsent += 1;
        }
        else if($record['attended'] =='L')
        {
          $late += 1;
        }
        $total += 1;
      }
      $attendedPercent = ((100/$total) * $attended);
      $authabsentPercent =((100/$total) * $authabsent);
      $absentPercent = ((100/$total) * $absent);
      $latePercent = ((100/$total) * $late);

      ?>
      <h2>Attendance For Student: <?php echo $_SESSION['userinfo'];?></h2>
      <p>Below you will be able to see the attendance figures for yourself. This will show all cases of attendance, absence, authorised absence and latness.</p>
      <label>Attended: </label>  <?php echo $attended."(".$attendedPercent."%)"; ?> <br>
      <label>Absent: </label> <?php echo $absent."(".$absentPercent."%)"; ?><br>
      <label>Authorised Absences: </label>  <?php echo $authabsent."(".$authabsentPercent."%)"; ?><br>
      <label>Late: </label>  <?php echo $late."(".$latePercent."%)"; ?>

      <?php
    }
  ?>




</div>
