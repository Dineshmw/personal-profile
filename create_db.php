<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE IF NOT EXISTS portfolio";
  $conn->exec($sql);
  echo "Database created successfully\n";
} catch(PDOException $e) {
  echo $sql . "\n" . $e->getMessage();
}
?>
