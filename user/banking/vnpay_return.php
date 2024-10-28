<?php
session_start(); // Khởi động session
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

// Khai báo thông tin VNPay
$vnp_HashSecret = "QCBIKPJDQ5NTRTDNNZDJU3QOVJIQ518Z"; // Chuỗi bí mật

// Nhận dữ liệu từ VNPay
$vnp_SecureHash = $_GET['vnp_SecureHash'];
unset($_GET['vnp_SecureHash']);
ksort($_GET);

$hashData = '';
foreach ($_GET as $key => $value) {
    $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
}
$hashData = substr($hashData, 1);
$vnp_SecureHashCalculated = hash_hmac('sha512', $hashData, $vnp_HashSecret);

// Kiểm tra xem giao dịch có thành công hay không
if ($vnp_SecureHash === $vnp_SecureHashCalculated) {
    // Giao dịch hợp lệ
    $transactionStatus = $_GET['vnp_ResponseCode'];
    
    // Kiểm tra mã phản hồi
    if ($transactionStatus === '00') {
        // Lưu dữ liệu vào cơ sở dữ liệu
        $orderInfo = $_GET['vnp_OrderInfo'];

        // Sử dụng biểu thức chính quy để tìm tên phim
        preg_match('/Vé phim:\s*([^+-]+)/', $orderInfo, $movieMatches);
        
        // Sử dụng biểu thức chính quy để tìm thời gian chiếu phim
        preg_match('/Thời gian:\s*([\d:]+)/', $orderInfo, $timeMatches);

        preg_match('/Số vé:\s*(\d+)/', $orderInfo, $ticketMatches);
        
        // Kiểm tra nếu tìm thấy tên phim
        if (isset($movieMatches[1])) {
            $movieName = trim($movieMatches[1]); // Lấy tên phim và loại bỏ khoảng trắng thừa
        } else {
            $movieName = null; // Hoặc giá trị mặc định nếu không tìm thấy
        }
        
        // Kiểm tra nếu tìm thấy thời gian chiếu phim
        if (isset($timeMatches[1])) {
            $screeningTime = $timeMatches[1]; // Lấy thời gian chiếu phim
        } else {
            $screeningTime = null; // Hoặc giá trị mặc định nếu không tìm thấy
        }
        
        if (isset($ticketMatches[1])) {
            $ticketQuantity = (int)trim($ticketMatches[1]); // Lấy số lượng vé và chuyển thành số nguyên
        } else {
            $ticketQuantity = 0; // Nếu không tìm thấy, đặt giá trị mặc định là 0
        }

        // Các giá trị khác
        $totalAmount = $_GET['vnp_Amount'] / 100; // VNPay trả về số tiền theo đơn vị tiền tệ
        $customerId = $_SESSION['user_id']; // Lấy customer_id từ session
        

       include '../db_connection.php';

        // Chuẩn bị và thực hiện câu truy vấn
        $stmt = $conn->prepare("INSERT INTO ticketbookings (movie_name, customer_id, ticket_quantity,  total_price, screening_time, booking_date) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("siids", $movieName, $customerId, $ticketQuantity, $totalAmount, $screeningTime);
        
        if ($stmt->execute()) {
            echo "<script>
            alert('Giao dịch thành công! Dữ liệu đã được lưu vào cơ sở dữ liệu.');
            window.location.href = '../account/history.php'; 
          </script>";
        } else {
            echo "Lỗi: " . $stmt->error;
        }

        // Đóng kết nối
        $stmt->close();
        $conn->close();;
    } else {
        echo "<script>
            alert('Giao dịch không thành công.');
            window.location.href = '../movies/movies.php'; 
          </script>";
    }
} else {
    echo "Giao dịch không hợp lệ.";
}
?>
