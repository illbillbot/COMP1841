<?php
if(isset($_POST['questiontext'])) {
    try {
        include 'includes/DatabaseConnection.php';

       $sql = 'INSERT INTO question SET
       questiontext = :questiontext,
       questiondate = CURDATE(),
       moduleid = :moduleid,
       userid = :userid'; 
       $stmt = $pdo->prepare($sql);
       $stmt->bindValue(':questiontext', $_POST['questiontext']);
       $stmt->bindValue(':moduleid', $_POST['module']);
       $stmt->bindValue(':userid', $_POST['user']);
       $stmt->execute();
       header('Location: questions.php');
    }
    catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}
else{
    include 'includes/DatabaseConnection.php';
    $title = 'Ask a question';
    $sql_u = 'SELECT * FROM user';
    $users = $pdo->query($sql_u);
    $sql_m = 'SELECT * FROM module';
    $modules = $pdo->query($sql_m);
    ob_start();
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>