<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/questions.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header id="admin">
            <div class="header-content">
                <img class="brand-stamp" src="../css/images/gn-logo.png" alt="University of Greenwich logo" />
                <h1>Welcome to the Student forums and questions database</h1>
            </div>
        </header>
        <nav>
            <ul>
                <li><a href="questions.php">Questions and Forums</a></li>
                <li><a href="addquestion.php">Add a Question</a></li>
                <li><a href="modules.php">List of modules</a></li>
                <li><a href="users.php">List of Users</a></li>
                <li><a href="contact.php">Send a message</a></li>
                <li><a href="login/hub.php">Exit</a></li>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; IJDB 2023</footer>
    </body>
</html>