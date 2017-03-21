<div class="fullscreen">
<p>Next 7 Days</p>
<table>
  <tr>
    <th>Time</th>
  <?php
  $pdo = new PDO('mysql:dbname=wuc;host=127.0.0.1', 'student', 'student');
  session_start();
  $stmt = $pdo->prepare('SELECT * FROM lessons WHERE lesson_id = :lesson_id AND DATE(time_date) BETWEEN :todays_date AND :end_date');
  $lessons = find($pdo, 'register', 'student_id', $_SESSION['userinfo']);

  foreach($lessons as $id)
  {
    $criteria =
    [
      'lesson_id'=>$id['lesson_id'],
      'todays_date'=>date("Ymd"),
      'end_date'=>date("Ymd", strtotime("+7day"))
    ];



    $stmt->execute($criteria);

    foreach($stmt as $row)
    {
      //this needs to find a way of organising all selected data

    }

  }

//Creates headings for the table with the next 7 days of data
  for($count = 0; $count <7; $count++)
  {
    echo'<div class="timetable_dates">';
    $now = strtotime("+".$count."day");
    // gets the unix timestamp of the date/time now
    $dateDayName = date('D',$now);
    $dateddmmyyyy = date('d m y', $now);

    // formats that date to Day (mon) dd/mm/yyyy
    echo'<th>';
    echo $dateDayName, "<br>";
    echo $dateddmmyyyy;
    echo'</th>';

    echo'</div>';
    //think about having these elements inside a table??
  }
  //creating all of the rows for data
  echo'</tr>';
  for($count = 0; $count <8; $count++)
  {
    if($count == 0)
    {
      $time = "09:00 - 09:59";
    }
    elseif($count == 1)
    {
      $time = "10:00 - 10:59";
    }
    elseif($count == 2)
    {
      $time = "11:00 - 11:59";
    }
    elseif($count == 3)
    {
      $time = "12:00 - 12:59";
    }
    elseif($count == 4)
    {
      $time = "13:00 - 13:59";
    }
    elseif($count == 5)
    {
      $time = "14:00 - 14:59";
    }
    elseif($count == 6)
    {
      $time = "15:00 - 15:59";
    }
    elseif($count == 7)
    {
      $time = "16:00 - 16:59";
    }

    echo'<tr>';
    for($count1 = 0; $count1 <8; $count1++)
    {
      if($count1 == 0)
      {
        echo'<td>'.$time.'</td>';
      }
      else {
      echo'<td>'.$count1.'</td>';
      }

    }
    echo'</tr>';
  }

  ?>
</table>


</div>
