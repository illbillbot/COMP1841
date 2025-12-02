<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize & validate input
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $subject = trim($_POST['subject'] ?? 'Student forum message');
        $message = trim($_POST['message'] ?? '');

        if ($name === '' || $email === '' || $message === '') {
            throw new Exception('Name, email and message are required.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email address.');
        }

        // Insert into database
        InsertMessage($pdo, $name, $email, $subject, $message);

        // Provide success feedback
        $title = 'Message stored';
        $output = '<p>Thank you — your message has been received. The site administrator can view it in the admin area.</p>';
    } else {
        $title = 'Contact';
        ob_start();
        include '../templates/contact.html.php';
        $output = ob_get_clean();
    }
}
catch (Exception $e) {
    $title = 'An error has occurred';
    $output = 'Error sending message: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
