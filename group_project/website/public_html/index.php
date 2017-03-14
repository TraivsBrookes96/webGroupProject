<?php
require '../functions/functions.php';



require '../pages/'.$_GET['page'].'.php';
$templateVars = [
 'title' => $title,
 'content' => $content,
 'heading' => $heading
];

echo loadTemplate('../pages/layout.php', $templateVars);




?>
