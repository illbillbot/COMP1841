<?php
session_start();

require_once 'conn.php';

if (isset($_POST['login'])) {

    if ($_POST['username'] != "" && $_POST['password'] != "") {
        $username = $_POST['username'];
		// md5 encrypted 
		// $password = md5($_POST['password']);
        $password = $_POST['password'];
        $sql = "SELECT * FROM `account` WHERE `username`=? AND `password`=?";
        $query = $conn->prepare($sql);
        $query->execute(array($username, $password));
		$row = $query->rowCount(); 
		$fetch = $query->fetch();

        if ($row > 0) {
            // Store full user info in session
            $_SESSION['user'] = $fetch['mem_id'];
            $_SESSION['username'] = $fetch['username'];
            // Check if admin user
            if ($_SESSION['username'] === 'admin') {
                header("location: home_redirect.php");   // ADMIN REDIRECT
                exit;
            } else {
                header("location: home.php");        // NORMAL USER REDIRECT
                exit;
            }

        } else {
            echo "
            <script>alert('Invalid username or password');</script>
            <script>window.location = 'index.php'</script>
            ";
        }

    } else {
        echo "
        <script>alert('Please complete the required field!');</script>
        <script>window.location = 'index.php'</script>
        ";
    }
}
?>
