<?php
if(isset($_POST['questiontext'])) {
    try {
        include 'includes/DatabaseConnection.php';

       $sql = 'INSERT INTO question SET
       questiontext = :questiontext,
       questiondate = CURDATE(),
       authorid = 1'; 
       $stmt = $pdo->prepare($sql);
       $stmt->bindValue(':questiontext', $_POST['questiontext']);
       $stmt->execute();
       header('Location: questions.php');
    }
    catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}
else{
    $title = 'Ask a question';
    ob_start();
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>