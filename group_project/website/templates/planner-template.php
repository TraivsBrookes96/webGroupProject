<div class="fullscreen">

  <?php
  require '../classes/tablegenerator.php';
  $pdo = new PDO('mysql:dbname=wuc;host=127.0.0.1', 'student', 'student');
  session_start();

  if(isset($_SESSION['userinfo']))
  {



  $stmt = $pdo->prepare('SELECT l.time_date,l.module_id, l.lesson_id, r.student_id, l.staff_id, l.room_id FROM register r JOIN lessons l ON r.lesson_id = l.lesson_id WHERE r.student_id = :student_id AND DATE(l.time_date) BETWEEN :todays_date AND :end_date ORDER BY l.time_date ASC');
  $stmt2 = $pdo->prepare('SELECT * FROM diaries WHERE student_id =:student_id AND DATE(start_time) BETWEEN :todays_date AND :end_date ORDER BY start_time ASC');
  $criteria =
  [
    'student_id'=>$_SESSION['userinfo'],
    'todays_date'=>date("Ymd"),
    'end_date'=>date("Ymd", strtotime("+7day"))
  ];





$table = new TableGenerator();
$day1 = date('d-m-y', strtotime("+0day"));
$day2 = date('d-m-y', strtotime("+1day"));
$day3 = date('d-m-y', strtotime("+2day"));
$day4 = date('d-m-y', strtotime("+3day"));
$day5 = date('d-m-y', strtotime("+4day"));
$day6 = date('d-m-y', strtotime("+5day"));
$day7 = date('d-m-y', strtotime("+6day"));
$table->setHeadings(['Time', $day1, $day2, $day3, $day4, $day5, $day6, $day7]);
$table->setColumnTypes(['th','td','td','td','td','td','td','td']);
$calendarDate1 = date('d-m-y', strtotime("+0day"));
$calendarDate2 = date('d-m-y', strtotime("+1day"));
$calendarDate3 = date('d-m-y', strtotime("+2day"));
$calendarDate4 = date('d-m-y', strtotime("+3day"));
$calendarDate5 = date('d-m-y', strtotime("+4day"));
$calendarDate6 = date('d-m-y', strtotime("+5day"));
$calendarDate7 = date('d-m-y', strtotime("+6day"));

  for($count = 0; $count <8; $count++)
  {
    $stmt->execute($criteria);
    $stmt2->execute($criteria);

    $data1=$data2=$data3=$data4=$data5=$data6=$data7 = null;

    switch($count)
    {
      case 0:
      {
        $time = "09:00 - 09:59";
        $compareTime = "09:00:00";
        break;
      }
      case 1:
      {
        $time = "10:00 - 10:59";
        $compareTime = "10:00:00";
        break;
      }
      case 2:
      {
        $time = "11:00 - 11:59";
        $compareTime = "11:00:00";
        break;
      }
      case 3:
      {
        $time = "12:00 - 12:59";
        $compareTime = "12:00:00";
        break;
      }
      case 4:
      {
        $time = "13:00 - 13:59";
        $compareTime = "13:00:00";
        break;
      }
      case 5:
      {
        $time = "14:00 - 14:59";
        $compareTime = "14:00:00";
        break;
      }
      case 6:
      {
        $time = "15:00 - 15:59";
        $compareTime = "15:00:00";
        break;
      }
      case 7:
      {
        $time = "16:00 - 16:59";
        $compareTime = "16:00:00";
        break;
      }

    }
    foreach($stmt as $lesson)
    {

      $lessonDate = date('d-m-y', strtotime($lesson['time_date']));
      //this line retrives the time of a lesson
      $lessonTime = date('H:i:s', strtotime($lesson['time_date']));




    if($lessonDate == $calendarDate1 && $lessonTime == $compareTime)
    {
      $data1 = 'Module ID: '.$lesson['module_id'].'<br> Room ID: '.$lesson['room_id'];
    }
    elseif($lessonDate == $calendarDate2 && $lessonTime == $compareTime)
    {
      $data2 = 'Module ID: '.$lesson['module_id'].'<br> Room ID: '.$lesson['room_id'];
    }
    elseif($lessonDate == $calendarDate3 && $lessonTime == $compareTime)
    {
      $data3 =  'Module ID: '.$lesson['module_id'].'<br> Room ID: '.$lesson['room_id'];
    }
    elseif($lessonDate == $calendarDate4 && $lessonTime == $compareTime)
    {
      $data4 = 'Module ID: '.$lesson['module_id'].'<br> Room ID: '.$lesson['room_id'];
    }
    elseif($lessonDate == $calendarDate5 && $lessonTime == $compareTime)
    {
      $data5 = 'Module ID: '.$lesson['module_id'].'<br> Room ID: '.$lesson['room_id'];
    }
    elseif($lessonDate == $calendarDate6 && $lessonTime == $compareTime)
    {
      $data6 = 'Module ID: '.$lesson['module_id'].'<br> Room ID: '.$lesson['room_id'];
    }
    elseif($lessonDate == $calendarDate7 && $lessonTime == $compareTime)
    {
      $data7 = 'Module ID: '.$lesson['module_id'].'<br> Room ID: '.$lesson['room_id'];
    }
  }
  foreach($stmt2 as $diary)
  {
    $lessonDate = date('d-m-y', strtotime($diary['start_time']));
    //this line retrives the time of a lesson
    $lessonTime = date('H:i:s', strtotime($diary['start_time']));




  if($lessonDate == $calendarDate1 && $lessonTime == $compareTime)
  {
    $data1 = $data1."<br>Session: ".$diary['session_name']."<br>Room: ".$diary['room_id'];
  }
  elseif($lessonDate == $calendarDate2 && $lessonTime == $compareTime)
  {
    $data2 = $data2."<br>Session: ".$diary['session_name']."<br>Room: ".$diary['room_id'];
  }
  elseif($lessonDate == $calendarDate3 && $lessonTime == $compareTime)
  {
    $data3 =  $data3."<br>Session: ".$diary['session_name']."<br>Room: ".$diary['room_id'];
  }
  elseif($lessonDate == $calendarDate4 && $lessonTime == $compareTime)
  {
    $data4 = $data4."<br>Session: ".$diary['session_name']."<br>Room: ".$diary['room_id'];
  }
  elseif($lessonDate == $calendarDate5 && $lessonTime == $compareTime)
  {
    $data5 = $data5."<br>Session: ".$diary['session_name']."<br>Room: ".$diary['room_id'];
  }
  elseif($lessonDate == $calendarDate6 && $lessonTime == $compareTime)
  {
    $data6 = $data6."<br>Session: ".$diary['session_name']."<br>Room: ".$diary['room_id'];
  }
  elseif($lessonDate == $calendarDate7 && $lessonTime == $compareTime)
  {
    $data7 = $data7."<br>Session: ".$diary['session_name']."<br>Room: ".$diary['room_id'];
  }
  }

    $table->addRow([$time,$data1,$data2,$data3,$data4,$data5,$data6,$data7]);


  }
echo $table->getHTML();
}
  ?>



</div>
