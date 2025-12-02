<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    if (!isset($_GET['id'])) {
        throw new Exception('No message specified.');
    }

    $id = (int) $_GET['id'];
    $message = GetMessage($pdo, $id);

    if (!$message) {
        throw new Exception('Message not found.');
    }

    // Mark as read
    if (!$message['is_read']) {
        MarkMessageRead($pdo, $id);
        // refresh data
        $message = GetMessage($pdo, $id);
    }

    $title = 'View message';
    ob_start();
    include '../templates/viewmessage.html.php';
    $output = ob_get_clean();
}
catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Unable to view message: ' . $e->getMessage();
}
include '../templates/admin_layout_redirect.html.php';
