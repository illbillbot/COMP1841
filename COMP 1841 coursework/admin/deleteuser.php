<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    if (!isset($_POST['id'])) {
        throw new Exception('No user specified.');
    }

    $id = $_POST['id'];

    // Will throw exception if user has questions
    DeleteUser($pdo, $id);

    header('Location: users.php');
    exit;
}
catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete user: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
