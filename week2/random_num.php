<!DOCTYPE html>
<html>
    <head>
        <style>
            .greenitalic{
                color :green;
                font-style: italic;
            }
            .bluebold{
                color:blue;
                font-style: bold;
            }
            .redbold{
                color:red;
                font-style: bold;
            }
            .mix{
                color:black;
                font-style:bold;
                font-style: italic;
            }

        </style>
    </head>
    <body>
        <?php
        $x =(rand(100,200));
        $y =(rand(100,200));
        echo "<p class=greenitalic>". "The first number is:". $x."</p>" ;
        echo "<p class=bluebold>"."The second number is:". $y. "</p>";
        echo "<p class=redbold>"."The sum of both:".$x+$y. "</p>";
        echo "<p class=mix>". "The multiplication of both:".$x * $y. "</p>";



        ?>
    </body>
</html>