<!DOCTYPE html>
<html lang = en>>
    <head>
        <meta charset = "UTF-8">
        <title>t2</title>
    </head>
    <body>
    <?php
    $month = date("F");
    if($month == "August"){
        print("It's August, so it's really hot.");
    }
    else{
        print("Not August, so at least not in the peak of the heat.");
    }
    ?>
    </body>
</html>