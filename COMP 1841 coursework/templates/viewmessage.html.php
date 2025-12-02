<h2>Message details</h2>

<p><strong>From:</strong> <?= htmlspecialchars($message['name'], ENT_QUOTES, 'UTF-8') ?></p>
<p><strong>Email:</strong> <a href="mailto:<?= htmlspecialchars($message['email'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($message['email'], ENT_QUOTES, 'UTF-8') ?></a></p>
<p><strong>Subject:</strong> <?= htmlspecialchars($message['subject'], ENT_QUOTES, 'UTF-8') ?></p>
<p><strong>Received:</strong> <?= htmlspecialchars($message['message_date'], ENT_QUOTES, 'UTF-8') ?></p>
<p><strong>Message:</strong></p>
<blockquote style="white-space:pre-wrap;"><?= htmlspecialchars($message['message'], ENT_QUOTES, 'UTF-8') ?></blockquote>

<p><a href="messages.php">Back to messages</a></p>
<form action="deletemessage.php" method="post" onsubmit="return confirm('Delete this message?');">
    <input type="hidden" name="id" value="<?= $message['id'] ?>">
    <input type="submit" value="Delete message">
</form>
