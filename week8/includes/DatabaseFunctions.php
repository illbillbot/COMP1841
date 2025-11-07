<?php
function allJokes($pdo){
    $jokes = query($pdo, 'SELECT joke.id, joketext, `name`, email, categoryName FROM joke
    INNER JOIN author ON authorid = author.id
    INNER JOIN category ON categoryid = category.id');
    return $jokes->fetchAll();
}
function allAuthors($pdo){
    $authors = query($pdo, 'SELECT * FROM author');
    return $authors->fetchAll();
}

function allCategories($pdo){
    $categories = query($pdo, 'SELECT * FROM category');
    return $categories->fetchAll();
}

function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function getjoke($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM joke WHERE id = :id', $parameters);
    return $query->fetch();
}

function insertjoke($pdo, $joketext, $authorid, $categoryid){
    $query = 'INSERT INTO joke(joketext, jokedate, authorid,categoryid)
    VALUES(:joketext, CURDATE(), :authorid, :categoryid)';
    $parameters = [':joketext' => $joketext, ':authorid' => $authorid, ':categoryid' => $categoryid];
    query($pdo, $query, $parameters);
}

function updatejoke($pdo, $jokeId, $joketext){
    $query = 'UPDATE joke SET joketext = :joketext WHERE id = :id';
    $parameters = [':joketext' => $joketext, ':id' => $jokeId];
    query($pdo, $query, $parameters);
}

function deletejoke($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM joke WHERE id = :id', $parameters);   
}

function totalJokes($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM jokes');
    $row = $query->fetch();
    return $row[0];
}