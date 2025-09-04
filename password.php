<?php
$hash = password_hash('admin123', PASSWORD_DEFAULT);
require 'db.php';

try {
    $stmt = $pdo->prepare("INSERT INTO admin (password) VALUES (?)");
    $stmt->execute([$hash]);
} catch (PDOException $e) {
    echo "Error inserting password: " . $e->getMessage();
}
?>