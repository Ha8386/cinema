<?php 
include '../../user/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addcinema'])) {
    $name_cinemas = $_POST['name_cinemas'];
    $address_cinemas = $_POST['address_cinemas'];
    $quantity = intval($_POST['quantity']);

   
    
    // Chuẩn bị câu truy vấn SQL
    $stmt = $conn->prepare("INSERT INTO cinemas (name_cinemas, address_cinemas, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name_cinemas, $address_cinemas, $quantity);

    // Thực hiện câu truy vấn
    if ($stmt->execute()) {
        echo "Thêm rạp thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

// Xoá phim
if (isset($_GET['delete'])) {
    $id_to_delete = intval($_GET['delete']);

    // Chuẩn bị câu truy vấn xóa
    $stmt = $conn->prepare("DELETE FROM cinemas WHERE cinema_id = ?");

    if ($stmt === false) {
        die('Lỗi câu lệnh SQL: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $id_to_delete);

    // Thực hiện câu truy vấn
    if ($stmt->execute()) {
        echo "Xóa rạp thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

// sửa phim



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
            <a href="./ad_movie.php">
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
            
            <a href="">
                <li class="submenu-item">
                    <i class="fas fa-caret-right"></i>
                    Quản lý rạp chiếu
                </li>
            </a>
            
            <a href="">
                <li class="submenu-item">
                    <i class="fas fa-caret-right"></i>
                    Quản lý lịch chiếu
                </li>
            </a>
            <a href="">
                <li class="submenu-item">
                    <i class="fas fa-caret-right"></i>
                    Quản lý suất chiếu
                </li>
            </a>
            <a href="">
                <li>
                    <i class="fas fa-ticket-alt"></i>
                    Quản lý đơn đặt vé
                </li>
            </a>
            <a href="">
                <li>
                    <i class="fas fa-tags"></i>
                    Quản lý ưu đãi
                </li>
            </a>
            <a href="">
                <li>
                    <i class="fas fa-users"></i>
                    Quản lý khách hàng
                </li>
            </a>
            <a href="">
                <li>
                    <i class="fas fa-user-tie"></i>
                    Quản lý nhân viên
                </li>
            </a>
            <a href="">
                <li>
                    <i class="fas fa-chart-line"></i>
                    Quản lý doanh thu
                </li>
            </a>
            <a href="/4scinema/user/login.php">
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
                <h1> Danh sách rạp</h1>
                <div>
                    <button class="add" id="createMovieBtn">
                        <i class="fas fa-plus"></i> 
                        Tạo rạp chiếu
                    </button>
                    
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên rạp</th>
                        <th>Địa chỉ</th>
                        <th>Số lượng ghế</th>
                        <th>Hành động</th>
                        
                    </tr>
                </thead>
                <tbody id="cinemasList">
                    <?php
                    // Kết nối và truy xuất dữ liệu như đã mô tả ở trên
                    include '../../user/db_connection.php'; // Đường dẫn đến file kết nối cơ sở dữ liệu

                    // Lấy danh sách rạp
                    $query = "SELECT * FROM cinemas"; 
                    $result = $conn->query($query);
                    $count = 1;

                    // Kiểm tra và hiển thị dữ liệu
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $count++ .  '</td>';
                            echo '<td>' . $row['name_cinemas'] . '</td>';
                            echo '<td>' . $row['address_cinemas'] . '</td>';
                            echo '<td>' . $row['quantity'] . '</td>';
                            echo '<td><button  class="edit" onclick="openEditModal(' . $row['cinema_id'] . ')">Sửa</button>
                            <button class="delete" onclick="deleteCinemas(' . $row['cinema_id'] . ')">Xóa</button></td>';
                            echo '</td>';
                        }
                    } else {
                        echo '<tr><td colspan="4">Không có dữ liệu nào.</td></tr>';
                    }
                    ?>
                </tbody>

            </table>
            <div class="pagination">
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
            </div>
        </div>
    </div>
           
     <!-- The Modal -->
     <form action="cinemas.php" method="POST" enctype="multipart/form-data">
         <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Thêm rạp</h1>
                <div class="container">
                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="name">* Tên rạp</label>
                            <input type="text" name="name_cinemas" placeholder="Enter name" >
                        </div>
                        <div class="form-group half-width">
                            <label for="address">* Địa chỉ</label>
                            <input type="text" name="address_cinemas" placeholder="Enter address">
                        </div>
                    </div>
                    
                    
                
                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="quantity">* Số lượng ghế</label>
                            <input type="text" name="quantity" placeholder="Enter quantity">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <button class="submit-btn" id="addMovieBtn" name ="addcinema">Thêm rạp</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    

    <!-- Sửa phim -->
    

    



    <script src="../js/admin.js"></script>
</body>
</html>