<?php
if(isset($_POST['questiontext'])){
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DatabaseFunctions.php';
        include '../includes/uploadFile.php';
        InsertQuestion($pdo, $_POST['questiontext'], $_POST['users'], $_POST['modules'], $_FILES['fileToUpload']['name']);
        header('Location: questions.php');
    }
    catch (PDOException $e){
        $title = 'An error has occurred' ;
        $output = 'Database error: ' . $e->getMessage();
    }
}
else{
    include '../includes/DatabaseConnection.php' ;
    include '../includes/DatabaseFunctions.php' ;
    $title = 'Add a new Question' ;
    $users = AllUser($pdo);
    $modules = AllModule($pdo);
    ob_start();
    include '../templates/addquestion.html.php' ;
    $output = ob_get_clean() ;
}
include '../templates/admin_layout.html.php' ;
