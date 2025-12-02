<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';
    if (!isset($_POST['id'])) throw new Exception('No module specified.');

    DeleteModule($pdo, $_POST['id']);
    header('Location: modules.php');
    exit;
}
catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete module: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
