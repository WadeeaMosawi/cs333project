<?php
include 'index.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    $id = $data->id;

    $sql = "DELETE FROM articles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    echo json_encode(["message" => "Article deleted successfully!"]);
}
?>
