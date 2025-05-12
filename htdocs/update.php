<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Get the raw PUT data
    $data = json_decode(file_get_contents("php://input"));
    
    // Sanitize input data
    $id = (int)$data->id;
    $title = htmlspecialchars($data->title);
    $content = htmlspecialchars($data->content);
    
    // Update article in the database
    $sql = "UPDATE articles SET title = ?, content = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title, $content, $id]);
    
    echo json_encode(["message" => "Article updated successfully!"]);
}
?>
