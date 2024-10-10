<?php
// Kết nối cơ sở dữ liệu
include '../user/db_connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /// Xử lý Đăng nhập
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == "admin" && $password == "admin") {
            // Redirect to admin.php in the 'admin' folder
            header('Location: ../admin/admin.php');
            exit();
        } else {
            
            // Chuẩn bị câu truy vấn để lấy mật khẩu đã mã hóa từ bảng customer
            $stmt = $conn->prepare("SELECT id, password FROM customers WHERE username = ?");
            
            // Kiểm tra xem prepare() có thành công hay không
            if ($stmt === false) {
                die("Lỗi truy vấn SQL: " . $conn->error);
            }
    
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();
    
            if ($stmt->num_rows > 0) {
                // Lấy kết quả
                $stmt->bind_result($user_id, $hashed_password);
                $stmt->fetch();
    
                // Kiểm tra mật khẩu
                if (password_verify($password, $hashed_password)) {
                    // Lưu thông tin người dùng vào session
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $username;
                    
                 
                } else {
                    $_SESSION['modal_to_show'] =  "incorrectPasswordModal";
                }
            } else {
                $_SESSION['modal_to_show'] = "userNotFoundModal";
            }
        }
    }


    // Xử lý Đăng ký
    if (isset($_POST['register'])) {
        // Lấy dữ liệu từ form đăng ký
        $customer_name = $_POST['customer_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Kiểm tra nếu mật khẩu khớp
        if ($password !== $confirm_password) {
            $_SESSION['modal_to_show'] = "passwordMismatch Modal";
            
        }
         // Kiểm tra xem email đã tồn tại chưa
         $check_email = "SELECT id FROM customers WHERE email = ?";
         $stmt = $conn->prepare($check_email);
         $stmt->bind_param("s", $email);
         $stmt->execute();
         $stmt->store_result();
        if  ($stmt->num_rows > 0) {
            $_SESSION['modal_to_show'] = "emailExistsModal";
        } else {
            // Kiểm tra xem tên đăng nhập đã tồn tại chưa
            $check_username = "SELECT id FROM customers WHERE username = ?";
            $stmt = $conn->prepare($check_username);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();
    
            if ($stmt->num_rows > 0) {
                // Nếu tên đăng nhập đã tồn tại
                $_SESSION['modal_to_show'] = "usernameExistsModal";
                
            } else {
            // Mã hóa mật khẩu để bảo mật
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
                // Chèn dữ liệu vào cơ sở dữ liệu
                $sql = "INSERT INTO customers (customer_name, email, phone, username, password) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if ($stmt === false) {
                    die("Lỗi truy vấn: " . $conn->error);
                }
                $stmt->bind_param("sssss", $customer_name, $email, $phone, $username, $hashed_password);
    
                if ($stmt->execute()) {
                    $_SESSION['modal_to_show'] = "registerSuccessModal";
                    
                } else {
                    echo "Lỗi: " . $stmt->error;
                }
            }
        }
         
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký/Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                            <div class="hd__search-wr">
                                <input type="text" class="hd__search-input" placeholder="Tìm phim, rạp">
                                <i class="hd__search-icon fa-solid fa-magnifying-glass"></i>
                            </div>
                        </li>
                        <li class="hd__login">
                            <i class="hd__login-icon fa-regular fa-circle-user"></i>
                            <a href="login.php" class="hd__login-link">
                                    
                                Đăng nhập
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>


        <div class="login">
                <div class="login-form login-form-login">
                    <form action="login.php" method="post">
                        <h1>Đăng nhập</h1>
                        <div class="input-box">
    
                            <input type="text" id="username" name="username" required placeholder="Tên đăng nhập">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input-box">
                            
                            <input type="password" id="password" name="password" required placeholder="Mật khẩu">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div class="remember-forgot">
                            <label>
                                <input type="checkbox"> Lưu mật khẩu đăng nhập
                            </label>
                            <a href="#">Quên mật khẩu</a>
                        </div>
                        <button class="btn" name="login">ĐĂNG NHẬP</button>
                        <div class="register-link">
                            <p>Bạn chưa có tài khoản? <a href="#"  class="switch-to-register">Đăng ký</a></p>
                        </div>
                    </form>
                </div>
            
                <div class="login-form login-form-register">

                    <form action="login.php" method="POST">
                        <h1>Đăng ký</h1>
                        <div class="input-box">
                            <input type="text" name="customer_name" required placeholder="Họ và tên">
                            <i class="fa-solid fa-pen"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" name="phone" required placeholder="Số điện thoại">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="input-box">
                            <input type="email" name="email" required placeholder="Email">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" name="username" required placeholder="Tên đăng nhập">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" required placeholder="Mật khẩu">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" name="confirm_password" required placeholder="Xác thực mật khẩu">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div class="remember-forgot">
                            <label>
                                <input type="checkbox"> Khách hàng đồng ý với các <a href="/policy.html" >điều khoản và chính sách bảo mật</a>
                                của 4SCinema
                            </label>
                        </div>
                        <button class="btn" name="register">ĐĂNG KÝ</button>
                        <div class="login-link">
                            <p>Bạn chưa có tài khoản? <a href="#" class="switch-to-login">Đăng nhập</a></p>
                        </div>
                    </form>
                </div>


                
                
        </div>
        
        <div class="modal-none">

            <!-- Modal cho đăng ký thành công -->
            <div class="modal" id="registerSuccessModal" >
                <div class="modal-content">
                    <span class="close" onclick="closeModal('registerSuccessModal')">&times;</span>
                    <p>Đăng ký thành công!</p>
                </div>
            </div>
    
            <!-- Modal cho email đã tồn tại -->
            <div id="emailExistsModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('emailExistsModal')">&times;</span>
                    <p>Email đã tồn tại!</p>
                </div>
            </div>

            <!-- Modal cho tên đăng nhập đã tồn tại -->
            <div id="usernameExistsModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('usernameExistsModal')">&times;</span>
                    <p>Tên đăng nhập đã tồn tại!</p>
                </div>
            </div>
    
            <!-- Modal cho mật khẩu không khớp -->
            <div id="passwordMismatchModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('passwordMismatchModal')">&times;</span>
                    <p>Mật khẩu không khớp!</p>
                </div>
            </div>
    
            <!-- Modal cho mật khẩu không đúng khi đăng nhập -->
            <div id="incorrectPasswordModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('incorrectPasswordModal')">&times;</span>
                    <p>Mật khẩu không đúng!</p>
                </div>
            </div>
    
            <!-- Modal cho tên người dùng không tồn tại -->
            <div id="userNotFoundModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('userNotFoundModal')">&times;</span>
                    <p>Không tìm thấy người dùng!</p>
                </div>
            </div>
        </div>
      
    </div>
    
    <script src="../user/script.js"></script>
    <?php if (isset($_SESSION['modal_to_show'])): ?>
        <script>
            const modalToShow = "<?php echo $_SESSION['modal_to_show']; ?>";
            console.log(modalToShow);
            showModal(modalToShow); // Gọi hàm hiển thị modal
            <?php unset($_SESSION['modal_to_show']);  ?>
        </script>
    <?php endif; ?>
    
                        

</body>

</html>