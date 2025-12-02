<p><?= $totalmodules ?> modules in the system.</p>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Module Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($modules as $module): ?>
        <tr>
            <td><?= htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8') ?></td>
            <td>
                <a href="editmodule.php?id=<?= $module['id'] ?>">Edit</a>
                <form action="deletemodule.php" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this module?');">
                    <input type="hidden" name="id" value="<?= $module['id'] ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<p><a href="addmodule.php">Add a new module</a></p>
