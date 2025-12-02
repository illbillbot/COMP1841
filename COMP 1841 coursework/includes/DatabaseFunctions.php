<?php
function AllQuestion($pdo){
    $questions = query($pdo, 'SELECT question.id, questiontext, `name`, email, moduleName, `image` FROM question
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id');
    return $questions->fetchAll();
}
function AllUser($pdo){
    $users = query($pdo, 'SELECT * FROM user');
    return $users->fetchAll();
}

function AllModule($pdo){
    $modules = query($pdo, 'SELECT * FROM module');
    return $modules->fetchAll();
}

function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function GetQuestion($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM question WHERE id = :id', $parameters);
    return $query->fetch();
}

function GetUser($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM user WHERE id = :id', $parameters);
    return $query->fetch();
}

function GetModule($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM module WHERE id = :id', $parameters);
    return $query->fetch();
}

function InsertQuestion($pdo, $questiontext, $userid, $moduleid, $fileToUpload){
    $query = 'INSERT INTO question(questiontext, questiondate, userid, moduleid, `image`)
    VALUES(:questiontext, CURDATE(), :userid, :moduleid, :fileToUpload)';
    $parameters = [':questiontext' => $questiontext, ':fileToUpload' => $fileToUpload, ':userid' => $userid, ':moduleid' => $moduleid];
    query($pdo, $query, $parameters);
}

function UpdateQuestion($pdo, $questionId, $questiontext, $userid, $moduleid, $fileToUpload){
    $query = 'UPDATE question SET questiontext = :questiontext, userid = :userid, moduleid = :moduleid, `image` = :image WHERE id = :id';
    $parameters = [':questiontext' => $questiontext, ':userid' => $userid, ':moduleid' => $moduleid, ':image' => $fileToUpload, ':id' => $questionId];
    query($pdo, $query, $parameters);
}

function DeleteQuestion($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM question WHERE id = :id', $parameters);   
}

function TotalQuestion($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM question');
    $row = $query->fetch();
    return $row[0];
}

function InsertUser($pdo, $name, $email){
    $sql = 'INSERT INTO user (`name`, email) VALUES (:name, :email)';
    $params = [':name' => $name, ':email' => $email];
    query($pdo, $sql, $params);
}

function UpdateUser($pdo, $id, $name, $email){
    $sql = 'UPDATE user SET `name` = :name, email = :email WHERE id = :id';
    $params = [':name' => $name, ':email' => $email, ':id' => $id];
    query($pdo, $sql, $params);
}

function DeleteUser($pdo, $id){
    // Prevent deleting a user that has questions.
    $q = query($pdo, 'SELECT COUNT(*) FROM question WHERE userid = :id', [':id' => $id]);
    $row = $q->fetch();
    if ($row[0] > 0){
        throw new Exception('Cannot delete user: user has questions. Reassign or delete questions first.');
    }
    query($pdo, 'DELETE FROM user WHERE id = :id', [':id' => $id]);
}

function TotalUser($pdo){
    $q = query($pdo, 'SELECT COUNT(*) FROM user');
    $r = $q->fetch();
    return $r[0];
}

function InsertModule($pdo, $moduleName){
    $sql = 'INSERT INTO module (moduleName) VALUES (:moduleName)';
    $params = [':moduleName' => $moduleName];
    query($pdo, $sql, $params);
}

function UpdateModule($pdo, $id, $moduleName){
    $sql = 'UPDATE module SET moduleName = :moduleName WHERE id = :id';
    $params = [':moduleName' => $moduleName, ':id' => $id];
    query($pdo, $sql, $params);
}

function DeleteModule($pdo, $id){
    // Prevent deletion if questions exist for this module
    $q = query($pdo, 'SELECT COUNT(*) FROM question WHERE moduleid = :id', [':id' => $id]);
    $row = $q->fetch();
    if ($row[0] > 0){
        throw new Exception('Cannot delete module: it has questions assigned. Reassign or delete those questions first.');
    }
    query($pdo, 'DELETE FROM module WHERE id = :id', [':id' => $id]);
}

function TotalModule($pdo){
    $q = query($pdo, 'SELECT COUNT(*) FROM module');
    $r = $q->fetch();
    return $r[0];
}

function InsertMessage($pdo, $name, $email, $subject, $message) {
    $sql = 'INSERT INTO messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)';
    $parameters = [':name' => $name,':email' => $email,':subject' => $subject,':message' => $message
    ];
    query($pdo, $sql, $parameters);
}

function AllMessages($pdo) {
    $sql = 'SELECT id, name, email, subject, message_date, is_read FROM messages ORDER BY message_date DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function GetMessage($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM messages WHERE id = :id', $parameters);
    return $query->fetch();
}

function MarkMessageRead($pdo, $id) {
    $sql = 'UPDATE messages SET is_read = 1 WHERE id = :id';
    query($pdo, $sql, [':id' => $id]);
}

function DeleteMessage($pdo, $id) {
    query($pdo, 'DELETE FROM messages WHERE id = :id', [':id' => $id]);
}

function TotalMessages($pdo) {
    $q = query($pdo, 'SELECT COUNT(*) FROM messages');
    $r = $q->fetch();
    return $r[0];
}
?>