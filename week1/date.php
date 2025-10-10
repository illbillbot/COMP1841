<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>date</title>
</head>
<body>
<?php 
$theDay = date("l");
echo "the day is $theDay<br />";
$theMonth = date("F");
echo "the month is $theMonth<br />";
$t = date("H");
if ($t < 13){
    echo "Good morning to you!";
}
else{
    echo "Good afternoon to you!";
}
?>
</body>
</html>
