<?php 
include '../../user/db_connection.php';
$search = isset($_GET['search']) ? addslashes($_GET['search']) : '';
    

// xoá ưu đãi
if (isset($_GET['delete'])) {
    $id_to_delete = intval(trim($_GET['delete']));

    // Chuẩn bị câu truy vấn xóa
    $stmt = $conn->prepare("DELETE FROM customers WHERE id = ?");

    if ($stmt === false) {
        die('Lỗi câu lệnh SQL: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $id_to_delete);

    // Thực hiện câu truy vấn
    if ($stmt->execute()) {
        echo "Xóa nhân viên thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../css/mainadmin.css">
    <link rel="stylesheet" href="../movie_management/ad_movie.css">
    <link rel="stylesheet" href="/4scinema/assets/fonts/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
<div class="sidebar">
        <h2>
            <a href="../admin.php">

                <i class="fas fa-user-circle"></i>
                Chức năng admin
            </a>
        </h2>
        <ul>
            <a href="../movie_management/ad_movie.php">
                <li>
                    <i class="fas fa-film"></i>
                    Quản lý phim
                </li>
            </a>
            
            <li class="active" onclick="toggleSubmenu(this)">
                <i class="fas fa-cube"></i>
                Quản lý rạp phim
                <i class="fas fa-chevron-right" style="position: absolute; right: 20px;"></i>
            </li>
            
         
           
            <a href="../showtime_management/showtime.php">
                <li class="submenu-item">
                    <i class="fas fa-caret-right"></i>
                    Quản lý lịch chiếu
                </li>
            </a>
            <a href="../screening_management/screening.php">
                <li class="submenu-item">
                    <i class="fas fa-caret-right"></i>
                    Quản lý suất chiếu
                </li>
            </a>
            <a href="../ticket_order/order.php">
                <li>
                    <i class="fas fa-ticket-alt"></i>
                    Quản lý đơn đặt vé
                </li>
            </a>
            <a href="../promotion/ad_promotion.php">
                <li>
                    <i class="fas fa-tags"></i>
                    Quản lý ưu đãi
                </li>
            </a>
            <a href="../customer/customer.php">
                <li>
                    <i class="fas fa-users"></i>
                    Quản lý khách hàng
                </li>
            </a>
            <a href="../employees/employees.php">
                <li>
                    <i class="fas fa-user-tie"></i>
                    Quản lý nhân viên
                </li>
            </a>
            <a href="../revenue/revenue.php">
                <li>
                    <i class="fas fa-chart-line"></i>
                    Quản lý doanh thu
                </li>
            </a>
            <a href="../../user/login.php">
                <li>
                    <i class="fas fa-sign-out-alt"></i>
                    Đăng xuất
                </li>
            </a>
        </ul>
    </div>
    

  
    


    <div class="header">
        <div class="menu-icon" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
            Home
        </div>
        <div class="user-info">
            <img src="/4scinema/assets/img/admin.jpg" alt="admin">
            <span>Nguyen Duc Ha</span>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="main-header">
                <h1> Danh sách khách hàng</h1>
                <div class="ad_nav">
                    <div class="ad_nav_item">

            
                        <a href="customer.php" class="reset-button">
                            <button>Hiển thị tất cả</button>
                        </a>
                    </div>
                    
                    <form action="customer.php" method="get">
                        <input type="text" name="search" required placeholder="Nhập dữ liệu"  value="<?php echo htmlspecialchars($search); ?>"/>
                        <input type="submit" name="ok" value="search" />
                    </form>
                    
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên </th>
                        <th>Email</th>
                        <th>Số điện thoại </th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Hành động</th>
                        
                    </tr>
                </thead>
                <tbody id="customerList">
                    <?php
                    // Kết nối và truy xuất dữ liệu như đã mô tả ở trên
                    if (!empty($search)) {
                        // Nếu có tìm kiếm, thực hiện truy vấn
                        $query = "SELECT * FROM customers WHERE customer_name LIKE '%$search%'";
                        $result = $conn->query($query);
                        $count=1;
                         // Kiểm tra và hiển thị dữ liệu
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $count++ .  '</td>';
                                echo '<td>' . $row['customer_name'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['phone'] . '</td>';
                                echo '<td>' . $row['username'] . '</td>';
                                echo '<td style="width: 150px; height: 30px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; display: block;">' . $row['password'] . '</td>';
                                echo '<td><button class="delete" onclick="deleteUser(' . $row['id'] . ')">Xóa</button></td>';
                                echo '</td>';
                            }
                        } else {
                            echo '<tr><td colspan="7">Không có dữ liệu nào.</td></tr>';
                        }
                    }else {

                        // Lấy danh sách khách hàng
                        $query = "SELECT * FROM customers"; 
                        $result = $conn->query($query);
                        $count = 1;
    
                        // Kiểm tra và hiển thị dữ liệu
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $count++ .  '</td>';
                                echo '<td>' . $row['customer_name'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['phone'] . '</td>';
                                echo '<td>' . $row['username'] . '</td>';
                                echo '<td style="width: 150px; height: 46px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; display: block;">' . $row['password_cs'] . '</td>';
                                echo '<td><button class="delete" onclick="deleteUser(' . $row['id'] . ')">Xóa</button></td>';
                                echo '</td>';
                            }
                        } else {
                            echo '<tr><td colspan="7">Không có dữ liệu nào.</td></tr>';
                        }
                    }


                    ?>
                </tbody>

            </table>
                    
        </div>
    </div>
           
    

    <!-- Sửa phim -->
    <script src="../js/admin.js"></script>

    
</body>
</html>