<?php
require_once __DIR__ . '/../includes/auth.php';
requireLogin();
require_once __DIR__ . '/../includes/db.php';

// Handle delete
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $stmt = $pdo->prepare('DELETE FROM projects WHERE id = :id');
    $stmt->execute([':id' => $id]);
    header('Location: projects.php?deleted=1');
    exit;
}

$projects = $pdo->query('SELECT * FROM projects ORDER BY created_at DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects | Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <div class="sidebar-logo">elif<span>.</span>dev</div>
            <nav class="sidebar-nav">
                <a href="index.php">📊 Dashboard</a>
                <a href="projects.php" class="active">📁 Projects</a>
                <a href="messages.php">📬 Messages</a>
            </nav>
            <div class="sidebar-footer">
                <span class="sidebar-user">👤 <?= htmlspecialchars($_SESSION['admin_user']) ?></span>
                <a href="logout.php" class="sidebar-logout">Sign Out</a>
            </div>
        </aside>

        <main class="admin-main">
            <header class="admin-header">
                <h1>Projects</h1>
                <a href="project_form.php" class="btn btn-primary-sm">+ Add Project</a>
            </header>

            <?php if (isset($_GET['deleted'])): ?>
                <div class="alert alert-success">Project deleted successfully.</div>
            <?php endif; ?>
            <?php if (isset($_GET['saved'])): ?>
                <div class="alert alert-success">Project saved successfully.</div>
            <?php endif; ?>

            <div class="table-wrapper">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Tags</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($projects)): ?>
                            <tr><td colspan="4" class="empty-state">No projects yet. Add your first one!</td></tr>
                        <?php else: ?>
                            <?php foreach ($projects as $p): ?>
                                <tr>
                                    <td class="td-title"><?= htmlspecialchars($p['title']) ?></td>
                                    <td>
                                        <div class="tag-list">
                                            <?php foreach (explode(',', $p['tags'] ?? '') as $tag): ?>
                                                <?php if (trim($tag)): ?>
                                                    <span class="table-tag"><?= htmlspecialchars(trim($tag)) ?></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </td>
                                    <td class="td-date"><?= date('M d, Y', strtotime($p['created_at'])) ?></td>
                                    <td class="td-actions">
                                        <a href="project_form.php?id=<?= $p['id'] ?>" class="btn-icon" title="Edit">✏️</a>
                                        <a href="projects.php?delete=<?= $p['id'] ?>" class="btn-icon btn-danger" title="Delete"
                                           onclick="return confirm('Are you sure you want to delete this project?')">🗑️</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
