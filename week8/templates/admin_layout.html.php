<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../jokes.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header id="admin">
        <h1>Internet Joke Database admin area<br />
        Manage jokes, categories and authors</h1></header>
        <nav>
            <ul>
                <!-- <li><a href="index.php">Home</a></li> -->
                <li><a href="jokes.php">Jokes</a></li>
                <li><a href="addjoke.php">Add a Joke</a></li>
                <li><a href="../index.php">public site</a></li>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; IJDB 2023</footer>
    </body>
</html>