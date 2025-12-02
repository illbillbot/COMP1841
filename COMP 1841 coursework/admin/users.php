<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $users = AllUser($pdo);
    $title = 'Users List';
    $totalusers = TotalUser($pdo);

    ob_start();
    include '../templates/users.html.php';
    $output = ob_get_clean();
}
catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
