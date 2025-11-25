<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once 'db_connect.php';

if (!isset($_GET['barcode'])) {
    echo json_encode(['success' => false, 'message' => 'No barcode provided']);
    exit;
}

$barcode = $_GET['barcode'];
$stmt = $conn->prepare("SELECT * FROM products WHERE barcode = ?");
$stmt->bind_param("s", $barcode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    echo json_encode(['success' => true, 'product' => $product]);
} else {
    echo json_encode(['success' => false, 'message' => 'Product not found']);
}
?>
