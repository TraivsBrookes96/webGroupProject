<?php
//Database connection details
$server = 'v.je';
$username = 'student';
$password = 'student';
$schema = 'wuc';

//Connect to database
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
echo "ok";




 ?>
