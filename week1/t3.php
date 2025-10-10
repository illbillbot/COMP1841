<!DOCTYPE html>
<html lang = en>
    <head>
        <meta charset = "UTF-8">
        <title>t3</title>
    </head>
    <body>
        <?php
        function CalAreaRect($w, $h)
        {
            $area = $w * $h;
            print("A rectangle of width $w and height $h has an area of $area.");
        }
        CalAreaRect(1,2);
        ?>
    </body>
</html>