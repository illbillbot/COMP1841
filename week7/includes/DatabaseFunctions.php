<?php
function query($pdo, $sql){
    $query = $pdo->query($sql);
    $query->execute();
    return $query;
}
function totalJokes($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM jokes');
    $row = $query->fetch();
    return $row[0];
}