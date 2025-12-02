<div class="form-container">
<h2>Edit User</h2>
<form action="" method="post">
    <input type="hidden" name="userid" value="<?= $user['id'] ?>">
    <label for="name">Name</label><br/>
    <input type="text" name="name" value="<?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?>" required><br/>

    <label for="email">Email</label><br/>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>" required><br/>

    <input type="submit" value="Save">
</form>
</div>