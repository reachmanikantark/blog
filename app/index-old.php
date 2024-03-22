<?php
$servername = $_ENV['DB_HOST']?:'192.168.1.13';
$username = $_ENV["DB_USER"];
$password = $_ENV["DB_PASS"];
$dbname=$_ENV["DB_NAME"];
echo $servername . "--". $username . "--". $password . "--". $dbname;

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}