<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

try {
    if (isset($_POST['moduleName'])) {
        $moduleName = trim($_POST['moduleName']);
        if ($moduleName === '') throw new Exception('Module name required.');
        InsertModule($pdo, $moduleName);
        header('Location: modules.php');
        exit;
    } else {
        $title = 'Add Module';
        ob_start();
        include '../templates/addmodule.html.php';
        $output = ob_get_clean();
    }
}
catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error adding module: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
