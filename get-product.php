<?php
header("Access-Control-Allow-Origin: *");
include 'db_connect.php';



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $barcode = $_GET['barcode'] ?? '';

    if (empty($barcode)) {
        echo json_encode(['status' => 'error', 'message' => 'No barcode provided']);
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM products WHERE barcode = ?");
    $stmt->bind_param("s", $barcode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo json_encode(['status' => 'success', 'product' => $row]);
    } else {
        echo json_encode(['status' => 'not_found']);
    }

    $stmt->close();
}
?>
