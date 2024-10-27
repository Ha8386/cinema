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
            justify-content: space-between;
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
        .form-section button {
            background: yellow;
            color: black;
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
            font-size: 20px;
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
        <div class="form-section">
            <h2>1 THÔNG TIN KHÁCH HÀNG</h2>
            <form>
                <label for="name">Họ và tên *</label>
                <input type="text" id="name" placeholder="Họ và tên" required>
                <label for="phone">Số điện thoại *</label>
                <input type="text" id="phone" placeholder="Số điện thoại" required>
                <label for="email">Email *</label>
                <input type="email" id="email" placeholder="Email" required>
                <label>
                    <input type="checkbox" required> Đảm bảo mua vé đúng số tuổi quy định.
                </label>
                <label>
                    <input type="checkbox" required> Đồng ý với điều khoản của Cinestar.
                </label>
                <button type="submit" >TIẾP TỤC</button>
            </form>
        </div>
        <div class="ticket-info">
            <div class="highlight">
                <span class="timer" id="timer">05:00</span>
            </div>
            <h2>VENOM: KẺO CUỐI (T13)</h2>
            <p>Phim dành cho khán giả từ đủ 13 tuổi trở lên (13+)</p>
            <p>Cinestar Hai Bà Trưng (T.P.HCM)</p>
            <p>135 Hai Bà Trưng, Phường Bến Nghé, Quận 1, Thành Phố Hồ Chí Minh</p>
            <p>Thời gian: 17:30 Thứ Bảy 26/10/2024</p>
            <p>Phòng chiếu: 01</p>
            <p>Số vé: 1</p>
            <p>Loại vé: Người Lớn</p>
            <p>Loại ghế: Ghế Thường</p>
            <p>Số ghế: E11</p>
            <p>Bắp nước: </p>
            <div class="price">
                <span>SỐ TIỀN CẦN THANH TOÁN</span>
                <span class="amount">70,000VND</span>
            </div>
        </div>
    </div>
    <script>
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function () {
            var fiveMinutes = 60 * 5,
                display = document.querySelector('#timer');
            startTimer(fiveMinutes, display);
        };
    </script>
</body>
</html>