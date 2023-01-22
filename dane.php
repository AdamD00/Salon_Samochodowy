<?php

  $servername = "127.0.0.1:3307";
  $username = "root";
  $password = "1234";
  $dbname = "salon_samochodowy";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT nazwa FROM modele";
  $result = $conn->query($sql);
  $options = mysqli_fetch_all($result, MYSQLI_ASSOC);

$conn->close();
?>