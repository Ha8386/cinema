<?php   
include '../db_connection.php';
session_start();
$search = isset($_GET['search']) ? addslashes($_GET['search']) : '';

$user_id = $_SESSION['user_id'];

// Lấy thông tin người dùng từ cơ sở dữ liệu
$stmt = $conn->prepare("SELECT customer_name, phone, email FROM customers WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($customer_name, $phone, $email);
$stmt->fetch();
$stmt->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ưu đãi đặc biệt</title>
    <link rel="icon" href="../assets/img/logo4S-onlyic.png" type="x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../admin/movie_management/ad_movie.css">
    <link rel="stylesheet" href="../cinemas/Showing_Movies/showing_movies.css">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-free-6.6.0-web/css/all.min.css">
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
                                <a href="../index.php" class="hd__logo-link">
                                    <img src="../../assets/img/logo4S.png" alt="4S CINEMA" class="hd__logo-img">
                                </a>
                            </li>
                            <li class="hd__nav-item hd__nav-item--local ">
                                Rạp phim
                                <div class="hd__local">
                                    <a href="../cinemas/Showing_Movies/4SCinema_CauGiay.php" class="hd__local-link">
                                        4SCinema Cầu Giấy
                                    </a>
                                    <a href="../cinemas/Showing_Movies/4SCinema_HaiBaTrung.php" class="hd__local-link">
                                        4SCinema Hai Bà Trưng
                                    </a>
                                    <a href="../cinemas/Showing_Movies/4SCinema_LongBien.php" class="hd__local-link">
                                        4SCinema Long Biên
                                    </a>
                                    <a href="../cinemas/Showing_Movies/4SCinema_MyDinh.php" class="hd__local-link">
                                        4SCinema Mỹ Đình
                                    </a>
                                    <a href="../cinemas/Showing_Movies/4SCinema_TayHo.php" class="hd__local-link">
                                        4SCinema Tây Hồ
                                    </a>
                                    <a href="../cinemas/Showing_Movies/4SCinema_ThanhXuan.php" class="hd__local-link">
                                        4SCinema Thanh Xuân
                                    </a>                           
                                </div>
                            </li>
                            <li class="hd__nav-item">
                                <a href="../showtimes.php" class="hd__nav-link">Lịch chiếu</a>
                            </li>
                            <li class="hd__nav-item">
                                <a href="../promotion.php" class="hd__nav-link">Ưu đãi</a>
                            </li>
                        </ul>

                    
                        <ul class="hd__right">
                            <li class="hd__search">
                                <form action="search.php" method="get" >
                                    <div class="hd__search-wr">
                                        <input type="text" name="search" class="hd__search-input" placeholder="Tìm phim, rạp" required>
                                        <button type="submit" class="hd__search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </li>
                            <li class="hd__login">
                                <i class="hd__login-icon fa-regular fa-circle-user"></i>
                                <a href="../login.php" class="hd__login-link">
                                        
                                    <?php if (isset($_SESSION['customer_name'])): ?>
                                        <?php echo htmlspecialchars($_SESSION['customer_name']); ?>
                                    <?php else: ?>
                                        Đăng nhập
                                    <?php endif; ?>
                                 </a>
                                <div class="hd-login-item">
                                    <a class="hd__local-link" href="profile.php">Cập nhật thông tin</a>
                                    <a class="hd__local-link" href="history.php">Lịch sử đặt vé</a>
                                    <a class="hd__local-link" href="../logout.php">Đăng xuất</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </header>

        <div class="app-profile">
            <div class="grid">
                <div class="prof-wr">
                    <div class="prof-main">
                        <div class="sec-heading">
                            <h2 class="heading">Thông tin khách hàng</h2>
                        </div>
                        <div class="acc-prof">
                            <div class="update-prof">
                                <form action="update_profile.php" method="POST">
                                    <h1>Sửa thông tin</h1>
                                    <div class="input-box">
                                        <label for="">* Họ và tên</label>
                                        <input type="text" name="customer_name" value="<?php echo htmlspecialchars($customer_name); ?>" required >
                                    </div>
                                    <div class="input-box">
                                        <label for="">* Số điện thoại</label>
                                        <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
                                    </div>
                                    <div class="input-box">
                                        <label for="">* Email</label>
                                        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required >
                                    </div>
                                    
                                    <button  class="btn" name="update_profile">Cập nhật thông tin</button>
                                    
                                </form>
                            </div>
                            
                            <div class="update-pass">
                                <form action="change_password.php" method="POST">
                                    <h1>Đổi mật khẩu</h1>
                                    <div class="input-box">
                                        <label for="">* Mật khẩu cũ</label>
                                        <input type="password" name="password"  >
                                    </div>
                                    <div class="input-box">
                                        <label for="">* Mật khẩu mới</label>
                                        <input type="password" name="new_password" required >
                                    </div>
                                    <div class="input-box">
                                        <label for="">* Xác thực mật khẩu</label>
                                        <input type="password" name="confirm_password" required >
                                    </div>
                                    
                                    <button  class="btn" name="change_password">Đổi mật khẩu</button>
                                </form>
                            </div>

                        </div>
                    </div>
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
                            <div class="footer-left-logo"><img class="footer__logo-img" src="../../assets/img/logo4S-footer.png" alt=""></div>
                            <div class="footer-left-slogan">Your satisfaction is our joy !</div>
                            <div class="btn-order">
                                <button class="btn ticket">Đặt vé</button>
                                <button class="btn food">Đặt bắp nước</button>
                            </div>
                            <div class="footer-left-contact">
                                <a href="https://www.facebook.com/chotung.mrt"><i class="fa-brands fa-facebook"></i></a>
                                <a href="https://www.tiktok.com/@nguyenducha264"><i class="fa-brands fa-tiktok"></i></a>
                                <a href="https://www.instagram.com/bo0.905/"><i class="fa-brands fa-instagram"></i></a>
                                <a href="https://discord.gg/tvpEumX9"><i class="fa-brands fa-discord"></i></a>
                            </div>
                        </div>
        
                        <!-- Khối footer nhỏ bên phải                     -->
                        <div class="footer-top-right">
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-account">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Tài khoản</p>
                                        <a class="footer-column-link" href="../login.php"><li class="footer-column-menu">Đăng nhập</li></a>
                                        <a class="footer-column-link" href="../login.php"><li class="footer-column-menu">Đăng ký</li></a>
                                        <a class="footer-column-link" href=""><li class="footer-column-menu">Membership</li></a>
                                    </ul>
                                </div>
                            </div>    
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-watching-movie">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">Xem phim</p>
                                        <a class="footer-column-link" href="../cinemas/Showing_Movies/Showing_Movies.php"><li class="footer-column-menu">Phim đang chiếu</li></a>
                                        <a class="footer-column-link" href="../cinemas/Showing_Movies/Upcoming_Movies.php"><li class="footer-column-menu">Phim sắp chiếu</li></a>
                                        <a class="footer-column-link" href=""><li class="footer-column-menu">Suất chiếu đặc biệt</li></a>
                                    </ul>
                                </div>
                            </div>
        
                            <div class="footer-column">
                                <div class="footer-menu-column footer-column-my-cinemas">
                                    <ul class="footer-menu-list">
                                        <p class="footer-column-title">4SCinema</p>
                                <a class="footer-column-link" href=""><li class="footer-column-menu">Giới thiệu</li></a>
                                <a class="footer-column-link" href=""><li class="footer-column-menu">Liên hệ</li></a>
                                <a class="footer-column-link" href=""><li class="footer-column-menu">Tuyển dụng</li></a>
                            </ul>
                        </div>
                    </div>

                    <div class="footer-column">
                        <div class="footer-menu-column footer-column-cinemas-system">
                            <ul class="footer-menu-list">
                                <p class="footer-column-title">Hệ thống rạp</p>
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_CauGiay.php"><li class="footer-column-menu">4SCinema Cầu Giấy</li></a>
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_HaiBaTrung.php"><li class="footer-column-menu">4SCinema Hai Bà Trưng</li></a>
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_LongBien.php"><li class="footer-column-menu">4SCinema Long Biên</li></a>
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_MyDinh.php"><li class="footer-column-menu">4SCinema Mỹ Đình</li></a>
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_TayHo.php"><li class="footer-column-menu">4SCinema Tây Hồ</li></a>
                                <a class="footer-column-link" href="../cinemas/Showing_Movies/4SCinema_TayHo.php"><li class="footer-column-menu">4SCinema Thanh Xuân</li></a>          
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
                    <a class="footer-bottom-right-items" href="">Tin điện ảnh</a>
                    <a class="footer-bottom-right-items" href="">Hỏi và đáp</a>
                </div>
            </div>
        </div>
            </div>

    </footer>
        
    </div>
    <script src="./script.js"></script>
</body>

</html>