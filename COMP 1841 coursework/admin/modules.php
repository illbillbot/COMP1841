<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $modules = AllModule($pdo);
    $title = 'Module List';
    $totalmodules = TotalModule($pdo);

    ob_start();
    include '../templates/modules.html.php';
    $output = ob_get_clean();
}
catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
