<?php
session_start(); // Bắt đầu phiên làm việc

// Kiểm tra nếu có session cần xóa
if (isset($_SESSION['customer_name'])) {
    unset($_SESSION['customer_name']); // Xóa biến session cụ thể
}

// Xóa toàn bộ session
session_destroy(); 

// Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính
header("Location: login.php"); // Hoặc index.php
exit(); // Dừng thực thi script
?>
