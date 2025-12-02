<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try{
    if(isset($_POST['questiontext'])){
        include '../includes/uploadFile.php';
        UpdateQuestion($pdo, $_POST['questionid'], $_POST['questiontext'], $_POST['users'], $_POST['modules'], $_FILES['fileToUpload']['name']);
        header('Location: questions.php');
    }
    else{
        $question = GetQuestion($pdo, $_GET['id']);
        $title = 'Edit question';
        $users = AllUser($pdo);
        $modules = AllModule($pdo);
        ob_start();
        include '../templates/editquestion.html.php';
        $output = ob_get_clean();
    }
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Error editing question: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>