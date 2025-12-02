<p><?= $totalquestions ?> questions have been submitted to the Questions Database.</p>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Question</th>
            <th>Module</th>
            <th>Thumbnail</th>
            <th>Submitted By</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($questions as $question): ?>
        <tr>
            <td><?= htmlspecialchars($question['questiontext'], ENT_QUOTES, 'UTF-8') ?></td>

            <td><?= htmlspecialchars($question['moduleName'], ENT_QUOTES, 'UTF-8') ?></td>

            <td>
                <img height="100px"
                     src="../uploads/<?= htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8'); ?>" />
            </td>

            <td>
                <a href="mailto:<?= htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8') ?>
                </a>
            </td>

            <td>
                <a href="editquestion.php?id=<?= $question['id'] ?>">Edit</a>
                <form action="deletequestion.php" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this question?');">                    <input type="hidden" name="id" value="<?= $question['id'] ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
