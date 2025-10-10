<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>welcome form</title>
        <link rel="stylesheet" href="templates/style.css">
    </head>
    <body>
        <form action="" method="post">
            <label for="val1">First value:</label>
            <input type="text" name="val1"><br />
            <label for="val2">Second value:</label>
            <input type="text" name="val2"><br />
                <hr />
            Calculation:<br />
            <input type="radio" name="calc" value="add" checked>Add
            <input type="radio" name="calc" value="sub" checked>Subtract
            <input type="radio" name="calc" value="mult" checked>Multiply
            <input type="radio" name="calc" value="div" checked>Division
            <br />
            <input type="submit" value="calculate">
            <input type="reset" value="Clear">
        </form>
    </body>