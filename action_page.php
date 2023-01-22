<!DOCTYPE html>
<html lang="pl">
    <head>
    
        <meta charset="utf-8"/>
        <style>
        <?php include 'mystyle.css';?>
        </style>


<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "1234";
$dbname = "salon_samochodowy";
$wybor =  $_GET['selection'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
</head>
<body>
  <div class = "cmb">
    <div class="center">
  <?php
          $sql = "SELECT img_dir FROM modele where nazwa='$wybor'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
               ?> <?php echo '<img src="data:image;base64,'.base64_encode($row['img_dir']).'"alt=Image style"width: auto; height: auto;">';
            }
            } ?>
    </div>
  </div>
    <div class ="container">
      <div class = "box">
        <div class="box-row">
          <?php
          $sql = "SELECT cena FROM modele where nazwa='$wybor'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            ?>
            <div class ="box-cell box">
            <h2>
            Cena 
            </h2>
              <?php echo $row["cena"]. " zł"; ?>
              </div>
              <?php
            }
            
            } ?>
            <div class ="box-cell box">
            <h2>
              Miasto magazynu
              </h2>
              <?php
            $sql = "SELECT miejsce, przechowywanie.Ilość from magazyn INNER JOIN przechowywanie on magazyn.id_magazynu = przechowywanie.magazyn_id_magazynu INNER JOIN modele on przechowywanie.modele_id_model = modele.id_model where modele.nazwa='$wybor'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {              
             echo $row["miejsce"]." ---".$row["Ilość"]. " sztuk<br>";               
              }
            }
            else
            {
             echo "Brak<br>";
            }
            ?>
            </div>
            <?php
            $sql = "SELECT imie, nazwisko from pracownicy INNER JOIN modele on pracownicy.id_pracownika = modele.pracownicy_id_pracownika where modele.nazwa = '$wybor'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
              ?>
              <div class ="box-cell box">
              <h2>
              Odpowiedzialny pracownik
              </h2>
                <?php echo $row["imie"]." ".$row["nazwisko"]; ?>
                </div>
                <?php
              }
              
            } 


            $conn->close();


            ?>
        </div>
      </div>
      <center>
      <form>
        <input type="button" class="button" value="Powrót!" onclick="history.back()">
      </form>
          </center>
    </div>
  
</body>