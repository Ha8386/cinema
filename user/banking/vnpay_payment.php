<?php
session_start(); // Khởi động session

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Khai báo thông tin VNPay
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "https://localhost/4scinema/user/banking/vnpay_return.php";
$vnp_TmnCode = "S5JH5GRL"; // Mã website tại VNPAY 
$vnp_HashSecret = "QCBIKPJDQ5NTRTDNNZDJU3QOVJIQ518Z"; // Chuỗi bí mật

// Lấy thông tin từ form
$vnp_TxnRef = rand(100000, 999999); // Mã giao dịch ngẫu nhiên
$vnp_OrderInfo = "Vé phim: " . $_POST['movie_name'] . 
                 " - Thời gian: " . $_POST['screening_time'] . 
                 " - Số vé: " . $_POST['ticket_quantity'] . 
                 " - Loại vé: " . $_POST['ticket_type'] . 
                 " - Số ghế: " . $_POST['seat_number'] . 
                 " - Bắp nước: " . $_POST['food_names']; // Nếu có thông tin này
$vnp_OrderType = 'billpayment';
$vnp_Amount = $_POST['total_amount'] * 100;
$vnp_Locale = 'vn'; // Ngôn ngữ
$vnp_BankCode = 'NCB';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

// Lấy customer_id từ session
$customerId = $_SESSION['user_id']; // Đảm bảo bạn đã lưu customer_id vào session khi người dùng đăng nhập

// Tạo mảng tham số để xử lý
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
);

// Sắp xếp các tham số theo thứ tự tăng dần của tên
ksort($inputData);
$query = "";
$hashdata = "";
$i = 0;
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

// Tạo URL yêu cầu thanh toán
$vnp_Url = $vnp_Url . "?" . $query;
$vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
$vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

// Chuyển hướng người dùng đến URL thanh toán VNPay
header('Location: ' . $vnp_Url);
die();
?>
