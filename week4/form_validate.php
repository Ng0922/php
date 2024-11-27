<?php
if(isset($_GET)){
    if(isset($_GET["name"])){
        if(empty($_GET["name"])){
            echo "Please enter your name";
        }
    }
        if(empty($_GET["email"])){
            echo "Please enter your email";
        }
        if(empty($_GET["age"])){
            echo "Please enter your age";
        }
        ?>

        <?php
        $email =($_GET["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           echo "Invalid email format";
        }
        ?>
        <?php
        $age =(int)($_GET["age"]);
        if ($age <18 ){
            echo "invalid age";
        }
        else if ($age >100){
            echo "invalid age";
        }
        
    }
    ?>
        

<!DOCTYPE HTML>
<html>  
  <body>
  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        Age: <input type="text" name="age"><br>
        <input type ="submit">
  </body>
</html>