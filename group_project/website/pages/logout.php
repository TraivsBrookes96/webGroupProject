<?php
session_start();
$title = 'Log In';
$heading = 'Log In';
session_destroy();
$content = loadTemplate('../templates/login-template.php',[]); ?>
