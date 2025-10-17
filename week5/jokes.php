<?php
try{
    include 'includes/DatabaseConnection.php';

    $sql = 'SELECT * FROM joke';
    $jokes = $pdo->query($sql);
    $title = 'Jokes List';

    ob_start() ;
    include 'templates/jokes.html.php' ;
    $output = ob_get_clean() ;
}
catch (PDOException $e){
    $title = 'An error has occurred' ;
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php' ;