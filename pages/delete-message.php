<?php
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $deleteId = intval($_POST['id']);
    $stmt = $pdo->prepare("DELETE FROM contact_messages WHERE id = ?");
    $success = $stmt->execute([$deleteId]);

    echo json_encode(['success' => $success]);
}
