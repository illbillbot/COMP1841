<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $messages = AllMessages($pdo);
    $title = 'Messages';
    $totalmessages = TotalMessages($pdo);

    ob_start();
    include '../templates/messages.html.php';
    $output = ob_get_clean();
}
catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout_redirect.html.php';
?>