<?php
try{
    $pdo=new PDO('mysql:host=localhost;dbname=week4;charset=utf8mb4','root','');
    $sql='SELECT joketext FROM joke';
    $jokes=$pdo->query($sql);
}
catch(PDOException $e){
    $error="Unable to connect to the database server.".$e;
}
include 'templates/jokes.html.php';
?>