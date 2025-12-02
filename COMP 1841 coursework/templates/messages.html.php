<h2>Messages (<?= htmlspecialchars($totalmessages, ENT_QUOTES, 'UTF-8') ?>)</h2>

<table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse:collapse;">
    <thead>
        <tr>
            <th>From</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($messages as $message): ?>
        <tr>
            <td><?= htmlspecialchars($message['name'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><a href="mailto:<?= htmlspecialchars($message['email'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($message['email'], ENT_QUOTES, 'UTF-8') ?></a></td>
            <td><?= htmlspecialchars($message['subject'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($message['message_date'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= $message['is_read'] ? 'Read' : '<strong>New</strong>' ?></td>
            <td>
                <a href="viewmessage.php?id=<?= $message['id'] ?>">View</a>
                <form action="deletemessage.php" method="post" style="display:inline;" onsubmit="return confirm('Delete this message?');">
                    <input type="hidden" name="id" value="<?= $message['id'] ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
