<?php
require_once __DIR__ . '/../includes/auth.php';
requireLogin();
require_once __DIR__ . '/../includes/db.php';

$editing = false;
$project = ['id' => '', 'title' => '', 'description' => '', 'image_url' => '', 'link' => '', 'tags' => ''];
$errors = [];

if (isset($_GET['id'])) {
    $editing = true;
    $stmt = $pdo->prepare('SELECT * FROM projects WHERE id = :id');
    $stmt->execute([':id' => (int) $_GET['id']]);
    $found = $stmt->fetch();
    if ($found) {
        $project = $found;
    } else {
        header('Location: projects.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $project['title']       = trim($_POST['title'] ?? '');
    $project['description'] = trim($_POST['description'] ?? '');
    $project['image_url']   = trim($_POST['image_url'] ?? '');
    $project['link']        = trim($_POST['link'] ?? '');
    $project['tags']        = trim($_POST['tags'] ?? '');

    if (!$project['title']) $errors[] = 'Title is required.';
    if (!$project['description']) $errors[] = 'Description is required.';

    if (empty($errors)) {
        if ($editing) {
            $stmt = $pdo->prepare('UPDATE projects SET title = :title, description = :description, image_url = :image_url, link = :link, tags = :tags WHERE id = :id');
            $stmt->execute([
                ':title'       => $project['title'],
                ':description' => $project['description'],
                ':image_url'   => $project['image_url'],
                ':link'        => $project['link'],
                ':tags'        => $project['tags'],
                ':id'          => (int) $_POST['id'],
            ]);
        } else {
            $stmt = $pdo->prepare('INSERT INTO projects (title, description, image_url, link, tags) VALUES (:title, :description, :image_url, :link, :tags)');
            $stmt->execute([
                ':title'       => $project['title'],
                ':description' => $project['description'],
                ':image_url'   => $project['image_url'],
                ':link'        => $project['link'],
                ':tags'        => $project['tags'],
            ]);
        }
        header('Location: projects.php?saved=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $editing ? 'Edit' : 'Add' ?> Project | Admin</title>
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
                <h1><?= $editing ? 'Edit Project' : 'Add New Project' ?></h1>
                <a href="projects.php" class="btn btn-outline-sm">&larr; Back</a>
            </header>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-error">
                    <?php foreach ($errors as $err): ?>
                        <div><?= htmlspecialchars($err) ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="admin-form">
                <?php if ($editing): ?>
                    <input type="hidden" name="id" value="<?= $project['id'] ?>">
                <?php endif; ?>

                <div class="form-group">
                    <label for="title">Project Title *</label>
                    <input type="text" id="title" name="title" value="<?= htmlspecialchars($project['title']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description *</label>
                    <textarea id="description" name="description" rows="5" required><?= htmlspecialchars($project['description']) ?></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="image_url">Image URL</label>
                        <input type="text" id="image_url" name="image_url" value="<?= htmlspecialchars($project['image_url']) ?>" placeholder="https://...">
                    </div>
                    <div class="form-group">
                        <label for="link">Project Link</label>
                        <input type="text" id="link" name="link" value="<?= htmlspecialchars($project['link']) ?>" placeholder="https://...">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tags">Tags <small>(comma-separated)</small></label>
                    <input type="text" id="tags" name="tags" value="<?= htmlspecialchars($project['tags']) ?>" placeholder="Python, AI, TensorFlow">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary-sm"><?= $editing ? 'Update Project' : 'Create Project' ?></button>
                    <a href="projects.php" class="btn btn-outline-sm">Cancel</a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
