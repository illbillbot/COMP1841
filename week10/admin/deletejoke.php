<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';

    // $sql = 'DELETE FROM joke WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':id', $_POST['id']);
    // $stmt->execute();
    deletejoke($pdo, $_POST['id']);
    header('Location: jokes.php');
}
catch (PDOException $e){
    $title = 'An error has occurred' ;
    $output = 'Unable to connect to delete joke: ' . $e->getMessage();
    }
include 'templates/layout.html.php' ;