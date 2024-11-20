<!DOCTYPE html>
<html>
    <head>
        <style>
          .bigger{
            font-weight: bold;
          }

        </style>
    </head>
    <body>
        <?php
        $t =(rand(0,200));
        $s =(rand(0,200));
        echo "num1:".$s."<br>";
        echo "num2:".$t;

        echo "<p class=bigger>" ;
        if($t > $s){
            echo $t ;
        }
        else{
            echo $s;
        }
        echo "</p>";
        ?>

    </body>
</html>