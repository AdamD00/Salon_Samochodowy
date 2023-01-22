<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <style>
        <?php include 'mystyle.css';?>
        </style>
        
    <?php require 'dane.php'; ?>
    </head>
<body>
    <div>
        <h1> Baza Salonu Samochodowego Ford </h1>
    </div>
    <center>
    <div class="selectWrapper">
    <form action="/action_page.php" metod="get">
        <select name="selection" class="selectBox">
            <option> Wybierz auto  </option>
            <?php
            foreach($options as $option){
                ?>
                <option value = "<?php echo $option['nazwa'];?>"><?php echo $option['nazwa'];?></option>
                <?php
            }
            ?>
        </select>
        </div>
        <br><br>
        <input type="submit" class="button" value="Potwierdz">
     </form>
        </center>
    
    
</body>
</html>