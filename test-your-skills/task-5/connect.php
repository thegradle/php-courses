<?php

$db = new mysqli('localhost', 'root', '', 'roketka');
if ($db->connect_error) {
  die("Помилка:". $db->connect_error);
}

?>