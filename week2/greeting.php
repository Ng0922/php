<!DOCTYPE html>
<html>
    <head>
        <style>
        
        </style>
    </head>
    <body>
        <?php
       $time =(rand(0,23));
       if($time >=5 && $time <=11){
        echo "Good Morning";
       }
       else if ($time >=12 && $time <=17){
        echo "Good Afternoon";
       }
       else if ($time >=18 && $time <= 21){
        echo "Good Evening";
       }
       else{
        echo "Good Night";
       }
        ?>
    </body>
</html>