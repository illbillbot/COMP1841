<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

try {
    if (isset($_POST['moduleName'])) {
        $id = $_POST['moduleid'];
        $moduleName = trim($_POST['moduleName']);
        if ($moduleName === '') throw new Exception('Module name required.');
        UpdateModule($pdo, $id, $moduleName);
        header('Location: modules.php');
        exit;
    } else {
        $module = GetModule($pdo, $_GET['id']);
        $title = 'Edit Module';
        ob_start();
        include '../templates/editmodule.html.php';
        $output = ob_get_clean();
    }
}
catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error editing module: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
