<?php
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $subtitle = trim($_POST['subtitle']);
    $description = trim($_POST['description']);
    $tags = trim($_POST['tags']);
    $github = trim($_POST['github']);
    $demo = trim($_POST['demo']);

    if (!empty($_FILES['image']['name'])) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                $imagePath = 'uploads/' . $fileName;
            } else {
                die("Error: Failed to upload image.");
            }
        } else {
            die("Error: Only JPG, JPEG, PNG, GIF, and WEBP files are allowed.");
        }
    } else {
        die("Error: Please upload an image.");
    }

    $stmt = $pdo->prepare("INSERT INTO projects (image, title, subtitle, description, tags, github, demo, created_at) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");

    $inserted = $stmt->execute([$imagePath, $title, $subtitle, $description, $tags, $github, $demo]);

    if ($inserted) {
        header("Location: ../dashboard.php");
        exit;
    } else {
        echo "Error: Failed to save project.";
    }
}
?>


<h2 class="section-title">Add Project</h2>
<form action="pages/add-project.php" method="POST" enctype="multipart/form-data" class="project-form">

    <label class="form-label">Project Image:</label>
    <input type="file" name="image" class="form-input" required>

    <label class="form-label">Project Title:</label>
    <input type="text" name="title" class="form-input" required>

    <label class="form-label">Project Subtitle:</label>
    <input type="text" name="subtitle" class="form-input" required>

    <label class="form-label">Project Description:</label>
    <input type="text" name="description" class="form-input" rows="5" required></input>

    <label class="form-label">Project Tags:</label>
    <input type="text" name="tags" class="form-input" placeholder="e.g. PHP, JavaScript">

    <label class="form-label">GitHub Link:</label>
    <input type="url" name="github" class="form-input" required>

    <label class="form-label">Demo Link:</label>
    <input type="url" name="demo" class="form-input">

    <button type="submit" class="btn-submit">Save Project</button>
</form>