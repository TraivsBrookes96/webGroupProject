<?php

$server = '127.0.0.1';
$username = 'student';
$password = 'student';

$schema = 'wuc';

$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


function insert($pdo, $table, $record) {
    $keys = array_keys($record);

    $values = implode(', ', $keys);
    $valuesWithColon = implode(', :', $keys);

    $query = 'INSERT INTO ' . $table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';

    $stmt = $pdo->prepare($query);

    $stmt->execute($record);
}


function find($pdo, $table, $field, $value) {
        $stmt = $pdo->prepare('SELECT * FROM ' . $table . ' WHERE ' . $field . ' = :value');
        $criteria = [
                'value' => $value
        ];
        $stmt->execute($criteria);

        return $stmt;
}

function findAll($pdo, $table) {
        $stmt = $pdo->prepare('SELECT * FROM ' . $table );

        $stmt->execute();

        return $stmt;
}
function loadTemplate($fileName, $templateVars) {
 ob_start();
 require $fileName;
 $contents = ob_get_clean();
 return $contents;
}

function emailAdmin($email_content, $subject)
{
  mail('exampleemail@gmail.com', $subject, $email_content);
}
