<?php
include '../db_connection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if (isset($_POST['update_profile'])) {
    $user_id = $_SESSION['user_id'];
    $customer_name = $_POST['customer_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Cập nhật thông tin khách hàng
    $stmt = $conn->prepare("UPDATE customers SET customer_name = ?, phone = ?, email = ? WHERE id = ?");
    $stmt->bind_param("sssi", $customer_name, $phone, $email, $user_id);

    if ($stmt->execute()) {
        $_SESSION['customer_name'] = $customer_name; // Cập nhật dữ liệu session nếu tên thay đổi
        header('Location: profile.php?update=success');
    } else {
        header('Location: profile.php?update=error');
    }

    $stmt->close();
}
?>
