<!DOCTYPE html>
<html>
    <head>
        <style>
        
        </style>
    </head>
    <body>
        <?php
        define("USERNAME", "admin");
        define("PASSWORD", "1234");

        $inputUsername = "admin";
        $inputPassword = "1234";

        if($inputUsername === USERNAME){
            if($inputPassword === PASSWORD){
                echo "Login Successful";
            }
            else{
                echo "Invalid Password";
            }
        }
        else{
            echo "Invalid Username";
        }
        ?>
    </body>
</html>