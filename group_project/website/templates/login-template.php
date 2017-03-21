<?php
session_start();
require '../database/databaseconnection.php';
if (isset($_POST['login']) ) {

  $stmt = $pdo->prepare('SELECT * FROM students WHERE student_id = :student_id');
  $criteria = [
      'student_id' => $_POST['student_id']
  ];
  $stmt->execute($criteria);
  $students= $stmt->fetch();

  if (password_verify($_POST['password'], $students['password'])) {
    $_SESSION['studentloggedin'] = true;
    $_SESSION['userinfo'] = $students['student_id'];
    $_SESSION['course_id'] = $students['course_code'];
    ?>
    <meta http-equiv="refresh" content="1;url=home" />
    <?php
  }

  else {
    ?>
     <div id="LogIn">
       <form action="" method="POST">
         <p> sorry, please check your details and try again!</p>
         <br>
         <label>Student ID </label><input type="text" name="student_id"/>
         <br>
         <br>
         <label>Password </label><input type="password" name="password"/>
         <br>
         <br>
         <input type="submit" value="Log In" name="login"/>
       </form>
     </div>
     <div id="HomeVideo">
     </div>
  <?php
  }

}
else {
  ?>
  <div id="LogIn">
    <form action="" method="POST">
      <p> Please use your details to Log In</p>
      <br>
      <label>Student ID </label><input type="text" name="student_id"/>
      <br>
      <br>
      <label>Password </label><input type="password" name="password"/>
      <br>
      <br>
      <input type="submit" value="Log In" name="login"/>
    </form>
  </div>
  <div id="HomeVideo">
  </div>
  <?php
}


 ?>
