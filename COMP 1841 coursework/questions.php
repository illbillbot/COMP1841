<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php' ;

    $questions = AllQuestion($pdo);
    $title = ' Questions List' ;
    $totalquestions = TotalQuestion($pdo);

    ob_start() ;
    include 'templates/public_questions.html.php' ;
    $output = ob_get_clean() ;
}
catch (PDOException $e){
    $title = 'An error has occurred' ;
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php' ;