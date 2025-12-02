<p><?= $totalusers ?> users in the system.</p>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
            <td>
                <a href="edituser.php?id=<?= $user['id'] ?>">Edit</a>
                <form action="deleteuser.php" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p><a href="adduser.php">Add a new user</a></p>
