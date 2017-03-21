<?php
session_start();
require '../database/databaseconnection.php';
?>
<div class="fullscreen">
  <?php
  if (isset($_SESSION['studentloggedin']) && $_SESSION['studentloggedin'] == true) {
    $stmt = $pdo->prepare('SELECT * FROM students WHERE student_id = :student_id');
    $criteria = [
    'student_id' => $_SESSION['userinfo']
    ];
    $stmt->execute($criteria);
    $students = $stmt->fetch();
    ?>
  <a href=forms>Return to forms</a>

  <?php
  echo '<h3>'. 'Your student id is: '. $students['student_id']. '</h3>';

   ?>
  <p>Please ammend the data below so that it is correct</p>
  <p>Any data changed will be submitted to the admin team to approve.</p>
  <br>
  <form action="change-details" method="post">
    <input type="hidden" name="student_id" value="<?php echo $students['student_id'] ?>">
    <label class="details-form">Firstname</label>
    <input class="details-form" type="text" name="firstname" value="<?php echo $students['firstname']  ?>"/>
    <label class="details-form" >Surname</label>
    <input class="details-form"  type="text" name="surname" value="<?php echo $students['surname']  ?>"/>
    <label class="details-form" >Term Address</label>
    <input class="details-form"  type="text" name="term_address_line1" value="<?php echo $students['term_address_line1']  ?>"/>
    <input class="details-form"  type="text" name="term_address_line2" value="<?php echo $students['term_address_line2']  ?>"/>
    <input class="details-form"  type="text" name="term_address_postcode" value="<?php echo $students['term_address_postcode']  ?>"/>
    <input class="details-form"  type="text" name="term_address_county" value="<?php echo $students['term_address_county']  ?>"/>
    <label class="details-form" >Home Address</label>
    <input class="details-form"  type="text" name="home_address_line1" value="<?php echo $students['home_address_line1']  ?>"/>
    <input class="details-form"  type="text" name="home_address_line2" value="<?php echo $students['home_address_line2']  ?>"/>
    <input class="details-form"  type="text" name="home_address_postcode" value="<?php echo $students['home_address_postcode']  ?>"/>
    <input class="details-form"  type="text" name="home_address_county" value="<?php echo $students['home_address_county']  ?>"/>
    <label class="details-form" >Phone number</label>
    <input class="details-form" type="text" name="telephone_number" value="<?php echo $students['telephone_number']  ?>"/>
    <label class="details-form" >Email Address</label>
    <input class="details-form"  type="text" name="email_address" value="<?php echo $students['email_address']  ?>"/>
    <input type="hidden" name="active" value="y">
    <br>
    <input  class="details-form" type="submit" name="submit" value="Submit For Approval"/>
  </form>
  <?php
  if (isset($_POST['submit']) ) {

    $stmt = $pdo->prepare('INSERT INTO request (student_id, firstname, surname, term_address_line1, term_address_line2, term_address_postcode, term_address_county, home_address_line1, home_address_line2, home_address_postcode, home_address_county, telephone_number, email_address, active)
                            VALUES (:student_id, :firstname, :surname, :term_address_line1, :term_address_line2, :term_address_postcode, :term_address_county, :home_address_line1, :home_address_line2, :home_address_postcode, :home_address_county, :telephone_number, :email_address, :active) ');
      $criteria = [
      'student_id' => $_POST['student_id'],
      'firstname' => $_POST['firstname'],
      'surname' => $_POST['surname'],
      'term_address_line1' => $_POST['term_address_line1'],
      'term_address_line2' => $_POST['term_address_line2'],
      'term_address_postcode' => $_POST['term_address_postcode'],
      'term_address_county' => $_POST['term_address_county'],
      'home_address_line1' => $_POST['home_address_line1'],
      'home_address_line2' => $_POST['home_address_line2'],
      'home_address_postcode' => $_POST['home_address_postcode'],
      'home_address_county' => $_POST['home_address_county'],
      'telephone_number' => $_POST['telephone_number'],
      'email_address' => $_POST['email_address'],
      'active' => $_POST['active'],
    ];
      $stmt->execute($criteria);
      echo '<h2>' . "changes submitted, we will get back to you in 24 hours" . '</h2>';
  }



   ?>
</div>

<?php
}

else {
  echo "please log in to see this page";
}



 ?>
