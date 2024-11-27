         Welcome <?php echo $_GET["name"]; ?><br>
         Your Email: <?php echo $_GET["email"];?><br>
         Your Age: <?php echo $_GET["age"];?><br>

         <?php
        if(empty($_GET["name"])){
            echo "Please enter your name";
        }
        if(empty($_GET["email"])){
            echo "Please enter your email";
        }
        if(empty($_GET["age"])){
            echo "Please enter your age";
        }
        ?>

<!DOCTYPE html>
<html>
    <body>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        Age: <input type="text" name="age"><br>
        <input type ="submit">

    </form>
    </body>
</html>