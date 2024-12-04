<?php
    $user = "admin";
    $pass = 1234;
   
    if(empty($_POST["username"])){
        echo "Please Enter Username";
    }
    else if($_POST["username"] != $user){
        echo "Wrong Username";
    }

    else if(empty($_POST["password"])){
        echo "Please Enter Your Password";
    }
    else if($_POST["password"]!= $pass){
        echo "Wrong Password";
    }
    else if($_POST["username"] == $user && $_POST["password"] == $pass){
        echo "Welcome User";
    }
    ?>

<!DOCTYPE html>
<html>
    <body>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        UserName: <input type="text" name="username"><br>
        Password: <input type="text" name="password"><br>
        <input type ="submit">

    </form>
    </body>
</html>