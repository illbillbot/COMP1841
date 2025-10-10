<?php 
if (!isset($_POST['val1'])){
    include 'templates/form.html.php';
}
else{
    $val1 = $_POST['val1'];
    $val2 = $_POST['val2'];
    $calc = $_POST['calc'];
    if(is_numeric($val1) and is_numeric($val2)){
        switch ($calc){
            case "add":$result = $val1 + $val2;
                break;
            case "sub":$result = $val1 - $val2;
                break;
            case "mult":$result = $val1 * $val2;
                break;
            case "div":$result = $val1 / $val2;
                break;
            default:
                $result = "error";
        } 
     $output = "Calculation result:" . $result;
     include 'templates/result.html.php';
    }else{
        include 'templates/error.html.php';
    }   
}
?>