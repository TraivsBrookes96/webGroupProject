<!DOCTYPE html>
<?php extract($templateVars);

?>
<html>
    <head>
      <meta charset="UTF-8">
      <title><?php echo $title?></title>
      <link rel="stylesheet" type="text/css" href="layout.css" />
    </head>
    <body>
    <div id="banner">
      <img id="logo" src="logo.png"/>
      <header>
      <h1 id="heading">
          <?php echo $heading ?>
      </h1>
    </header>
    </div>
  <div id="navigation">
    <a href="home" class="button"><span>Home</span></a>
  <a href="planner" class="button"><span>Planner</span></a>
    <a href="grades" class="button"><span>Grades</span></a>
    <a href="http://www.outlook.com" class="button"><span>Mail</span></a>
    <a href="modules" class="button"><span>Modules</span></a>
    <a href="viewattendance" class="button>"><span>Attendance</span></a>
    <a href="logout" class="button"><span>Log Out</span></a>
  </div>
  <div id="main">
    <?php echo $content?>

  </div>



  <div id="footer">
    <footer>
      <a href="policies" class="button"><span class="foot_item">Policies & Procedures</span></a>
      <a href="faqs" class="button"><span class="foot_item">FAQ's</span></a>
      <a href="contact" class="button"><span class="foot_item">Contact Us</span></a>
      <a href="forms" class="button"><span class="foot_item">Forms</span></a>
    </footer>
  </div>
</body>
</html>
