<?php
require '../db.php';

$stmt = $pdo->query("SELECT * FROM projects ORDER BY id DESC");
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="delete-projects-container">
    <h2 class="delete-title">Delete Projects</h2>

    <?php if ($projects): ?>
        <div class="project-list">
            <?php foreach ($projects as $project): ?>
                <div class="project-card">
                    <img src="<?php echo htmlspecialchars($project['image']); ?>"
                        alt="<?php echo htmlspecialchars($project['title']); ?>" class="project-image">
                    <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                    <form method="post" class="delete-form" data-id="<?php echo $project['id']; ?>">
                        <button type="submit" class="delete-button">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>

                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="no-projects">No projects found.</p>
    <?php endif; ?>
</div>