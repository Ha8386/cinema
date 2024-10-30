<?php 
include 'db_connection.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" &&  isset($_POST['email'])) {

    $email = $_POST["email"]; // Lấy email từ form
    $verificationCode = generateVerificationCode(); // Tạo mã xác minh

    // Kiểm tra xem email có tồn tại trong database không
    $stmt = $conn->prepare("SELECT * FROM customers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $hashedPassword = password_hash($verificationCode, PASSWORD_DEFAULT);

    if ($result->num_rows > 0) {
        // Nếu email tồn tại, cập nhật password_cs bằng mã xác minh
        $stmt = $conn->prepare("UPDATE customers SET password_cs = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashedPassword, $email);
        $stmt->execute();

        // Gửi email mã xác minh bằng PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Cấu hình SMTP của Gmail
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'khangduy006@gmail.com'; // Email của bạn
            $mail->Password   = 'ijgi brbb llhm ruxl'; // Mật khẩu ứng dụng
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Thông tin email gửi đi
            $mail->setFrom('khangduy006@gmail.com', '4SCinema'); // Email người gửi
            $mail->addAddress($email); // Địa chỉ email người nhận

            $mail->isHTML(true);
            $mail->Body    = "Mật khẩu mới của bạn là: <b>$verificationCode</b>";

            $mail->send();
            echo "<script>
                    alert('Mã xác minh đã được gửi tới email của bạn!');
                    window.location.href = 'login.php';
                  </script>";
        } catch (Exception $e) {
            echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
        }
    } else {
        // Nếu email không tồn tại trong database
        echo "<script>alert('Email không tồn tại trong hệ thống!');</script>";
        
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}

// Hàm tạo mã xác minh 6 ký tự ngẫu nhiên
function generateVerificationCode() {
    return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ưu đãi đặc biệt</title>
    <link rel="icon" href="../assets/img/logo4S-onlyic.png" type="x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Antonio:wght@100..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="app">
    <header class="hd">
            <div class="grid">
                <div class="hd__main">
        
                    <ul class="hd__left">
                        <li class="hd__logo">
                            <a href="index.php" class="hd__logo-link">
                                <img src="../assets/img/logo4S.png" alt="4S CINEMA" class="hd__logo-img">
                            </a>
                        </li>
                        <li class="hd__nav-item hd__nav-item--local ">
                            Rạp phim
                            <div class="hd__local">
                                <a href="cinemas/Showing_Movies/4SCinema_CauGiay.php" class="hd__local-link">
                                    4SCinema Cầu Giấy
                                </a>
                                <a href="cinemas/Showing_Movies/4SCinema_HaiBaTrung.php" class="hd__local-link">
                                    4SCinema Hai Bà Trưng
                                </a>
                                <a href="cinemas/Showing_Movies/4SCinema_LongBien.php" class="hd__local-link">
                                    4SCinema Long Biên
                                </a>
                                <a href="cinemas/Showing_Movies/4SCinema_MyDinh.php" class="hd__local-link">
                                    4SCinema Mỹ Đình
                                </a>
                                <a href="cinemas/Showing_Movies/4SCinema_TayHo.php" class="hd__local-link">
                                    4SCinema Tây Hồ
                                </a>
                                <a href="cinemas/Showing_Movies/4SCinema_ThanhXuan.php" class="hd__local-link">
                                    4SCinema Thanh Xuân
                                </a>                           
                            </div>
                        </li>
                        <li class="hd__nav-item">
                            <a href="showtimes.php" class="hd__nav-link">Lịch chiếu</a>
                        </li>
                        <li class="hd__nav-item">
                            <a href="promotion.php" class="hd__nav-link">Ưu đãi</a>
                        </li>
                    </ul>

                   
                    <ul class="hd__right">
                        <li class="hd__search">
                        <form action="./search/search.php" method="get" >
                            <div class="hd__search-wr">
                                <input type="text" name="search" class="hd__search-input" placeholder="Tìm phim, rạp" required>
                                <button type="submit" class="hd__search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>

                        </li>
                        <li class="hd__login">
                            <i class="hd__login-icon fa-regular fa-circle-user"></i>
                            <a href="login.php" class="hd__login-link">
                                <?php if (isset($_SESSION['customer_name'])): ?>
                                    <?php echo htmlspecialchars($_SESSION['customer_name']); ?>
                                <?php else: ?>
                                    Đăng nhập
                                <?php endif; ?>
                                        
                            </a>
                            <div class="hd-login-item">
                                <a class="hd__local-link" href="account/profile.php">Cập nhật thông tin</a>
                                <a class="hd__local-link" href="account/history.php">Lịch sử đặt vé</a>
                                <a class="hd__local-link" href="logout.php">Đăng xuất</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="app-promotion">
            <div class="grid">
                <div class="main-forgot">
                    <div class="heading">Quên mật khẩu</div>
                    <p class="desc-forgot">Nhập địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn mật khẩu mới</p>
                    <form class="form-forgot" action="forgot_pw.php" method="POST"> 
                        <input type="email" name="email">
                        <button class="btn" type="submit" >GỬI MÃ XÁC MINH</button>
                    </form>
                </div>
            </div>
        </div>
        






        <!-- Khối footer -->
        <footer class="footer">
            <div class="grid">
                <div class="footer-container">
                    <!-- Khối footer top -->
                    <div class="footer-top">
                        <!-- Khối footer nhỏ bên trái                     -->
                        <div class="footer-top-left">
                            <div class="footer-left-logo"><img class="footer__logo-img" src="../assets/img/logo4S-footer.png" alt=""></div>
                            <div class="footer-left-slogan">Your satisfaction is our joy !</div>
                            <div class="btn-order">
                                <button class="btn ticket">Đặt vé</button>
                                <button class="btn food">Đặt bắp nước</button>
                            </div>
                            <div class="footer-left-contact">
                                <p class="contact-us">Liên hệ với chúng tôi: </p>
                                <div class="contact_block">
                                    <a href="https://www.facebook.com/profile.php?id=61567620087932"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="https://www.tiktok.com/@nguyenducha264"><i class="fa-brands fa-tiktok"></i></a>
                                    <a href="https://www.instagram.com/bo0.905/"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="https://discord.gg/tvpEumX9"><i class="fa-brands fa-discord"></i></a>
                                </div>
                            </div>
                        </div>
        
                        <!-- Khối footer nhỏ bên phải                     -->
                        <div class="footer-top-right">
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-account">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Tài khoản</p>
                                        <a class="footer-column-link" href="login.php"><li class="footer-column-menu">Đăng nhập</li></a>
                                        <a class="footer-column-link" href="login.php"><li class="footer-column-menu">Đăng ký</li></a>
                                    </ul>
                                </div>
                            </div>    
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-watching-movie">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Xem phim</p>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/Showing_Movies.php"><li class="footer-column-menu">Phim đang chiếu</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/Upcoming_Movies.php"><li class="footer-column-menu">Phim sắp chiếu</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/Special_Showtimes.php"><li class="footer-column-menu">Suất chiếu đặc biệt</li></a>
                                    </ul>
                                </div>
                            </div>

                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-cinemas-system">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Hệ thống rạp</p>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_CauGiay.php"><li class="footer-column-menu">4SCinema Cầu Giấy</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_HaiBaTrung.php"><li class="footer-column-menu">4SCinema Hai Bà Trưng</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_LongBien.php"><li class="footer-column-menu">4SCinema Long Biên</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_MyDinh.php"><li class="footer-column-menu">4SCinema Mỹ Đình</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_TayHo.php"><li class="footer-column-menu">4SCinema Tây Hồ</li></a>
                                        <a class="footer-column-link" href="cinemas/Showing_Movies/4SCinema_TayHo.php"><li class="footer-column-menu">4SCinema Thanh Xuân</li></a>          
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-bottom">
                        <div class="footer-bottom-left">
                            <i class="fa-regular fa-copyright"></i>
                            <p class="copyright">2024 4SCinema. All rights reserved.</p>
                        </div>

                        <div class="footer-bottom-right">
                            <a class="footer-bottom-right-items" href="policy.php">Chính sách bảo mật</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>       
    </div>
    <script src="./script.js"></script>
</body>

</html>