<?php
try{
    include 'includes/DatabaseConnection.php';

    $sql = 'SELECT question.id, questiontext, `name`, email, moduleName FROM question
            INNER JOIN user ON userid = user.id
            INNER JOIN module ON moduleid = module.id';

    $questions = $pdo->query($sql);
    $title = 'Question list';

    ob_start();
    include 'templates/questions.html.php';
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>