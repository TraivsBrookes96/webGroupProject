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
      <img id="logo" src="logo.jpg"/>
      <header>
      <h1 id="heading">
          <?php echo $heading ?>
      </h1>
    </header>
    </div>
  <div id="navigation">
    <span><a href="home" class="button">Home</a></span>
    <span><a href="planner" class="button">Planner</a></span>
    <span><a href="grades" class="button">Grades</a></span>
    <span><a href="http://www.outlook.com" class="button">Mail</a></span>
    <span><a href="modules" class="button">Modules</a></span>
    <span><a href="viewattendance" class="button>">Attendance</a></span>
    <span><a href="logout" class="button">Log Out</a></span>
  </div>
  <div id="main">
    <?php echo $content?>

  </div>



  <div id="footer">
    <footer>
      <span class="foot_item"><a href="policies" class="button">Policies & Procedures</a></span>
      <span class="foot_item"><a href="faqs" class="button">FAQ's</a></span>
      <span class="foot_item"><a href="contact" class="button">Contact Us</a></span>
      <span class="foot_item"><a href="forms" class="button">Forms</a></span>
    </footer>
  </div>
</body>
</html>
