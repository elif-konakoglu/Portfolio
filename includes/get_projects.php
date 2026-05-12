<?php
header('Content-Type: application/json');
require_once __DIR__ . '/db.php';

try {
    $stmt = $pdo->query('SELECT id, title, description, image_url, link, tags, created_at FROM projects ORDER BY created_at DESC');
    $projects = $stmt->fetchAll();
    echo json_encode($projects);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to load projects.']);
}
