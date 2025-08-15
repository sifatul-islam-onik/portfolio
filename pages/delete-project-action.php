<?php
require '../db.php';

if (isset($_POST['delete_id'])) {
    $deleteId = intval($_POST['delete_id']);
    $stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
    if ($stmt->execute([$deleteId])) {
        echo "Project ID $deleteId deleted successfully!";
    } else {
        http_response_code(500);
        echo "Failed to delete project.";
    }
}
