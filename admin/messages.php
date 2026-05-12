<?php
require_once __DIR__ . '/../includes/auth.php';
requireLogin();
require_once __DIR__ . '/../includes/db.php';

// Handle delete
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $stmt = $pdo->prepare('DELETE FROM messages WHERE id = :id');
    $stmt->execute([':id' => $id]);
    header('Location: messages.php?deleted=1');
    exit;
}

$messages = $pdo->query('SELECT * FROM messages ORDER BY submitted_at DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages | Admin</title>
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
                <a href="projects.php">📁 Projects</a>
                <a href="messages.php" class="active">📬 Messages</a>
            </nav>
            <div class="sidebar-footer">
                <span class="sidebar-user">👤 <?= htmlspecialchars($_SESSION['admin_user']) ?></span>
                <a href="logout.php" class="sidebar-logout">Sign Out</a>
            </div>
        </aside>

        <main class="admin-main">
            <header class="admin-header">
                <h1>Messages</h1>
            </header>

            <?php if (isset($_GET['deleted'])): ?>
                <div class="alert alert-success">Message deleted.</div>
            <?php endif; ?>

            <div class="messages-list">
                <?php if (empty($messages)): ?>
                    <div class="empty-state-card">
                        <p>No messages yet. They'll appear here when visitors contact you.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($messages as $msg): ?>
                        <div class="message-card">
                            <div class="message-header">
                                <div>
                                    <h3><?= htmlspecialchars($msg['subject']) ?></h3>
                                    <div class="message-meta">
                                        <strong><?= htmlspecialchars($msg['name']) ?></strong>
                                        &middot;
                                        <a href="mailto:<?= htmlspecialchars($msg['email']) ?>"><?= htmlspecialchars($msg['email']) ?></a>
                                    </div>
                                </div>
                                <div class="message-actions">
                                    <span class="message-date"><?= date('M d, Y · H:i', strtotime($msg['submitted_at'])) ?></span>
                                    <a href="messages.php?delete=<?= $msg['id'] ?>" class="btn-icon btn-danger" title="Delete"
                                       onclick="return confirm('Delete this message?')">🗑️</a>
                                </div>
                            </div>
                            <p class="message-body"><?= nl2br(htmlspecialchars($msg['message'])) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>
</html>
