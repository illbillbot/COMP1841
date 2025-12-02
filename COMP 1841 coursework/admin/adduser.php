<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

try {
    if (isset($_POST['name'])) {
        // Basic server-side validation
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);

        if ($name === '' || $email === '') {
            throw new Exception('Name and email are required.');
        }

        InsertUser($pdo, $name, $email);
        header('Location: users.php');
        exit;
    } else {
        $title = 'Add User';
        ob_start();
        include '../templates/adduser.html.php';
        $output = ob_get_clean();
    }
}
catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error adding user: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
