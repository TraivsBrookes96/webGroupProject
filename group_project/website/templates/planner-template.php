<div class="fullscreen">
<p>Next 7 Days</p>
<table>
  <tr>
    <th>Time</th>
  <?php
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
    echo'<tr>';
    for($count1 = 0; $count1 <8; $count1++)
    {
      echo'<td>'.$count1.'</td>';
    }
    echo'</tr>';
  }

  ?>
</table>


</div>
