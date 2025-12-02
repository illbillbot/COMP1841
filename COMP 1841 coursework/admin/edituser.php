<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

try {
    if (isset($_POST['name'])) {
        $id = $_POST['userid'];
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        if ($name === '' || $email === '') {
            throw new Exception('Name and email cannot be empty.');
        }
        UpdateUser($pdo, $id, $name, $email);
        header('Location: users.php');
        exit;
    } else {
        $user = GetUser($pdo, $_GET['id']);
        $title = 'Edit user';
        ob_start();
        include '../templates/edituser.html.php';
        $output = ob_get_clean();
    }
}
catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error editing user: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
