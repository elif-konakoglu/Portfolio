<?php
require_once __DIR__ . '/../includes/auth.php';
requireLogin();
require_once __DIR__ . '/../includes/db.php';

$projectCount = $pdo->query('SELECT COUNT(*) FROM projects')->fetchColumn();
$messageCount = $pdo->query('SELECT COUNT(*) FROM messages')->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>
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
                <a href="index.php" class="active">📊 Dashboard</a>
                <a href="projects.php">📁 Projects</a>
                <a href="messages.php">📬 Messages</a>
            </nav>
            <div class="sidebar-footer">
                <span class="sidebar-user">👤 <?= htmlspecialchars($_SESSION['admin_user']) ?></span>
                <a href="logout.php" class="sidebar-logout">Sign Out</a>
            </div>
        </aside>

        <main class="admin-main">
            <header class="admin-header">
                <h1>Dashboard</h1>
                <a href="../index.php" target="_blank" class="btn btn-outline-sm">View Site &rarr;</a>
            </header>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">📁</div>
                    <div class="stat-info">
                        <span class="stat-value"><?= $projectCount ?></span>
                        <span class="stat-label">Projects</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">📬</div>
                    <div class="stat-info">
                        <span class="stat-value"><?= $messageCount ?></span>
                        <span class="stat-label">Messages</span>
                    </div>
                </div>
            </div>

            <div class="quick-actions">
                <h2>Quick Actions</h2>
                <div class="actions-grid">
                    <a href="project_form.php" class="action-card">
                        <span class="action-icon">➕</span>
                        <span>Add New Project</span>
                    </a>
                    <a href="projects.php" class="action-card">
                        <span class="action-icon">✏️</span>
                        <span>Manage Projects</span>
                    </a>
                    <a href="messages.php" class="action-card">
                        <span class="action-icon">📧</span>
                        <span>View Messages</span>
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
