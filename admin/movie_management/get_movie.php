<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../../user/db_connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM movies WHERE id = ?");
    
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $movie = $result->fetch_assoc();
            echo json_encode($movie);
        } else {
            echo json_encode([]);
        }

        $stmt->close();
    } else {
        echo json_encode(['error' => 'Lỗi truy vấn']);
    }
} else {
    echo json_encode(['error' => 'ID không được cung cấp']);
}
?>
