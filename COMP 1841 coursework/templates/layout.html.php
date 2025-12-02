<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/questions.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header>
            <div class="header-content">
                <img class="brand-stamp" src="css/images/gn-logo.png" alt="University of Greenwich logo" />
                <h1>Student forums and questions Database</h1>
            </div>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="questions.php">Questions</a></li>
                <!-- <li><a href="addquestion.php">Add a Question</a></li> -->
                <li><a href="admin/login/index.php"> Student login</a></li>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; IJDB 2023</footer>
    </body>
</html>