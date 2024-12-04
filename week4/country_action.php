<!DOCTYPE HTML>
<html>  
  <body>

    <?php echo $_GET["country"]; ?><br>
         <?php
         if(empty($_GET["country"])){
            echo "Please select your country". "</br>";
        }
         ?>
    <?php 
    $age = 2024 - $_GET["year"];
    echo "Age: " . $age . "</br>";
    ?>
    <?php echo $_GET["gender"];?>

  </body>
</html>