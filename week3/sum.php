<!DOCTYPE html>
<html>
    <head>
        <style>
        
        </style>
    </head>
    <body>
        <?php
        $a = 1;
        $b = 10;
        
        $sum = 0;
        for ($i = $a; $i <= $b; $i++) {
            $sum += $i;
        }

        echo "Sum from " . $a . " to " . $b . " = " . $sum;
        ?>
    </body>
</html>