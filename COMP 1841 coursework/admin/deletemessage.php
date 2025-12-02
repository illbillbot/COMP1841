<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    if (!isset($_POST['id'])) {
        throw new Exception('No message specified.');
    }

    DeleteMessage($pdo, (int) $_POST['id']);
    header('Location: messages.php');
    exit;
}
catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete message: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>