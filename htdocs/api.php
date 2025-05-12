<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
require_once 'replit_db.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = explode('/', trim($_SERVER['PATH_INFO'], '/'));

// Simple router
if ($path[0] === 'news') {
    if ($method === 'GET') {
        // Get all articles
        echo json_encode(['data' => SimpleDB::getAll('news_articles')]);
    } elseif ($method === 'POST') {
        // Add new article (simplified)
        $input = json_decode(file_get_contents('php://input'), true);
        $id = SimpleDB::create('news_articles', $input);
        echo json_encode(['message' => 'Article added', 'id' => $id]);
    }
} else {
    echo json_encode(['error' => 'Not found']);
}
?>