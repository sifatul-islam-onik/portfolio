<?php
require '../db.php';

$stmt = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2 class="section-title">Messages</h2>
<?php if ($messages): ?>
    <ul class="messages-list">
        <?php foreach ($messages as $msg): ?>
            <li class="message-card">
                <div class="message-header">
                    <strong class="message-name"><?php echo htmlspecialchars($msg['name']); ?></strong>
                    <span class="message-email">(<?php echo htmlspecialchars($msg['email']); ?>)</span>
                </div>
                <p class="message-body"><?php echo nl2br(htmlspecialchars($msg['message'])); ?></p>
                <small class="message-date"><?php echo $msg['created_at']; ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="no-messages">No messages yet.</p>
<?php endif; ?>