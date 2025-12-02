<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $row = GetQuestion($pdo, $_POST['id']);
    unlink('../uploads/' . $row['image']);
    DeleteQuestion($pdo, $_POST['id']);
    header('Location: questions.php');
}
catch (PDOException $e){
    $title = 'An error has occurred' ;
    $output = 'Unable to connect to delete question: ' . $e->getMessage();
    }
include '../templates/admin_layout.html.php' ;