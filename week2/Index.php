<!DOCTYPE html>
<html>
    <head>
        <style>
            body {background-color: white;}
            .redtext{
                color :red;
            }
            .bluetext{
                color:aquamarine;
            }
            .viotext{
                color:blueviolet;
            }

        </style>
    </head>
    <body>
        <?php
        date_default_timezone_set("Asia/Kuala_Lumpur");
        echo "<p class=redtext>My first PHP Sricpt!</p>";
        echo "<p class=bluetext>".date("d M Y")."</p>";
        echo "<p class=viotext>". date("H:i:s")."</p>";

        ?>
    </body>
</html>