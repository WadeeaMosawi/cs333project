<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Default limit and page values
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10; // Default to 10 items per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Default to page 1
    $offset = ($page - 1) * $limit; // Calculate the offset for pagination

    // Query to fetch articles with pagination
    $sql = "SELECT * FROM articles LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$limit, $offset]);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the articles as a JSON response
    echo json_encode($articles);

    // Optional: Return pagination info for the frontend to handle next/prev pages
    $countQuery = "SELECT COUNT(*) as total FROM articles";
    $countStmt = $conn->query($countQuery);
    $totalRecords = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];
    $totalPages = ceil($totalRecords / $limit); // Calculate total pages

    // Send pagination data alongside the result
    echo json_encode([
        'data' => $articles,
        'pagination' => [
            'current_page' => $page,
            'total_pages' => $totalPages,
            'total_records' => $totalRecords
        ]
    ]);
}
?>
