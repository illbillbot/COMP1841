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
                <h1>Administration Area</h1>
            </div>
        </header>
        <nav>
            <ul>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="login/hub_redirect.php">Exit</a></li>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; IJDB 2023</footer>
    </body>
</html>