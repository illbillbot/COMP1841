<?php
if(isset($_POST['joketext'])){
    try{
        include 'includes/DatabaseConnection.php';

        $sql = 'INSERT INTO joke SET
        joketext = :joketext,
        image = :image,
        jokedate = CURDATE()';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->bindValue(':image', $_POST['image']);
        $stmt->execute();
        header('Location: jokes.php');
    }
    catch (PDOException $e){
        $title = 'An error has occurred' ;
        $output = 'Database error: ' . $e->getMessage();
    }
}
else{
    $title = 'Add a Joke' ;
    ob_start() ;
    include 'templates/addjoke.html.php' ;
    $output = ob_get_clean() ;
}
include 'templates/layout.html.php' ;
