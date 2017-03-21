
  <?php
  session_start();
  $pdo = new PDO('mysql:dbname=wuc;host=127.0.0.1', 'student', 'student');
  if(isset($_SESSION['userinfo']))
  {
    if(!isset($_POST['Submit']))
    {
      echo'
      <div id="general-enquiry">
        <p> Please use the textbox below to deail your enquiry.</p>
        <p> We aim to reply within 7 working days. </p>
        <form action="gen-enquiries" method="post">
          <input type="textarea" name="text_email" style="width:50vw; height:20vh;"/>
          <br>
          <input type="submit" value="submit" name="Submit"/>
        </form>
        <br>
        <a href="forms">Return to Forms</a>
      </div>';
    }
    else
    {
      $to = 'administration@wuc.ac.uk';
      $subject ='General Enquiry';
      $message = $_POST['text_email'] + "Sent From: " + $_SESSION['userinfo'];

      mail($to, $subject, $message);
      echo'
      <div id="general-enquiry">
      <h3> Your enquiry has been submitted, you should hear back from one of the team within 7 working days. <br>
      Kind Regards <br>
      The Admin Team
      </div>';
    }
  }
  ?>
