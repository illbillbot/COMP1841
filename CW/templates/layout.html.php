<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="questions.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header>
            <h1>Student Forum</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="questions.php">Questions</a></li>
                <li><a href="addquestion.php">Ask a question</a></li>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; IJDB 2023</footer>
    </body>
</html>