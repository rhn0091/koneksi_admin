<?php
// Example for PHP
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");



// Include database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ukk_amri";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Parse the ID from the URL
    $id = $_GET['id'];

    if (!empty($id)) {
        $query = "DELETE FROM barang WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            http_response_code(200);
            echo json_encode(["message" => "Product deleted successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Failed to delete product"]);
        }
    } else {
        http_response_code(400);
        echo json_encode(["message" => "Invalid ID"]);
    }
} else {
    http_response_code(405);
    echo json_encode(["message" => "Method not allowed"]);
}
?>
