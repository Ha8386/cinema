<?php
// Kiểm tra xem form đã được gửi chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $movieName = isset($_POST['movie_name']) ? htmlspecialchars($_POST['movie_name']) : 'Chưa có thông tin';
    $showDate = isset($_POST['show_date']) ? htmlspecialchars($_POST['show_date']) : 'Chưa có thông tin';
    $screeningTime = isset($_POST['screening_time']) ? htmlspecialchars($_POST['screening_time']) : 'Chưa có thông tin';
    $seatNumbers = isset($_POST['seat_numbers']) ? htmlspecialchars($_POST['seat_numbers']) : 'Chưa có thông tin';
    $ticketQuantity = isset($_POST['ticket_quantity']) ? (int)$_POST['ticket_quantity'] : 0;
    $totalAmount = isset($_POST['total_amount']) ? (int)str_replace(' VNĐ', '', htmlspecialchars($_POST['total_amount'])) : 0;
    $foodNames = isset($_POST['food_names']) ? htmlspecialchars($_POST['food_names']) : 'Không có';
    $ticketType =  isset($_POST['ticket_types']) ? htmlspecialchars($_POST['ticket_types']) : 'Không có';
   
}
?>
<html>
<head>
    <title>Movie Ticket Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #0b0f27, #1a2a6c);
            color: white;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        .form-section, .ticket-info {
            background: #1a2a6c;
            padding: 20px;
            border-radius: 10px;
            width: 48%;
        }
        .form-section h2, .ticket-info h2 {
            color: yellow;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-section label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .form-section input[type="text"], .form-section input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
        }
        .form-section input[type="checkbox"] {
            margin-right: 10px;
        }
        .ticket-info button {
            background: yellow;
            color: black;
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .ticket-info {
            background: #2a3b8c;
        }
        .ticket-info h2 {
            font-size: 35px;
        }
        .ticket-info p {
            margin: 5px 0;
            font-size: 16px;
        }
        .ticket-info .highlight {
            color: yellow;
            font-size: 18px;
        }
        .ticket-info .price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            font-size: 20px;
        }
        .ticket-info .price .amount {
            color: yellow;
        }
        .timer {
            background: yellow;
            color: black;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 18px;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class="ticket-info">
        <form action="vnpay_payment.php" method="POST">
                <h2><?php echo $movieName; ?></h2>
                <p>Thời gian: <?php echo $screeningTime; ?></p>
                <p>Số vé: <?php echo $ticketQuantity; ?></p>
                <p>Loại vé: <?php echo $ticketType; ?></p>
                <p>Số ghế: <?php echo $seatNumbers; ?></p>
                <p>Bắp nước: <?php echo $foodNames; ?></p>
                <div class="price">
                    <span>SỐ TIỀN CẦN THANH TOÁN</span>
                    <span class="amount"><?php echo $totalAmount; ?> VNĐ</span>
                </div>
                <button type="submit">THANH TOÁN</button>
                <!-- Thêm các trường hidden để gửi dữ liệu đến vnpay_payment.php -->
                <input type="hidden" name="movie_name" value="<?php echo $movieName; ?>">
                <input type="hidden" name="ticket_type" value="<?php echo $ticketType; ?>">
                <input type="hidden" name="seat_number" value="<?php echo $seatNumbers; ?>">
                <input type="hidden" name="screening_time" value="<?php echo $screeningTime; ?>">
                <input type="hidden" name="ticket_quantity" value="<?php echo $ticketQuantity; ?>">
                <input type="hidden" name="total_amount" value="<?php echo $totalAmount; ?>">
            </form>
        </div>
    </div>
    
</body>
</html>