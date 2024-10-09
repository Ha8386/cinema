<?php 
include '../../user/db_connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addshowtime'])) {
    $movie_id = trim($_POST['movie_id']); 
    $show_date = trim($_POST['show_date']);

   
    $checkQuery = "SELECT * FROM showtimes WHERE movie_id = ? AND show_date = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("is", $movie_id, $show_date);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    echo "Lịch chiếu cho ngày này đã tồn tại.";
    return;
}

    // Chuẩn bị câu truy vấn SQL
    $stmt = $conn->prepare("INSERT INTO showtimes (movie_id, show_date) VALUES (?, ?)");
    $stmt->bind_param("is", $movie_id, $show_date);

    // Thực hiện câu truy vấn
    if ($stmt->execute()) {
        echo "Thêm lịch chiếu thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

// Xoá phim
if (isset($_GET['delete'])) {
    $id_to_delete = intval(trim($_GET['delete']));

    // Chuẩn bị câu truy vấn xóa
    $stmt = $conn->prepare("DELETE FROM showtimes WHERE showtime_id = ?");

    if ($stmt === false) {
        die('Lỗi câu lệnh SQL: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $id_to_delete);

    // Thực hiện câu truy vấn
    if ($stmt->execute()) {
        echo "Xóa lịch chiếu thành công!";
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
                <h1> Danh sách lịch chiếu</h1>
                <div>
                    <button class="add" id="createMovieBtn">
                        <i class="fas fa-plus"></i> 
                        Tạo lịch chiếu
                    </button>
                    
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên phim</th>
                        <th>Lịch chiếu</th>
                        <th>Hành động</th>
                        
                    </tr>
                </thead>
                <tbody id="showtimeList">
                    <?php
                    // Kết nối và truy xuất dữ liệu như đã mô tả ở trên
                    include '../../user/db_connection.php'; // Đường dẫn đến file kết nối cơ sở dữ liệu

                    // Lấy danh sách lịch chiếu
                    $query = "SELECT showtimes.showtime_id, movies.title, showtimes.show_date 
                              FROM showtimes 
                              JOIN movies ON showtimes.movie_id = movies.movie_id"; 
                    $result = $conn->query($query);
                    $count = 1;

                    // Kiểm tra và hiển thị dữ liệu
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $count++ .  '</td>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['show_date'] . '</td>';
                            echo '<td><button  class="edit" onclick="openEditModal(' . $row['showtime_id'] . ')">Sửa</button>
                            <button class="delete" onclick="deleteShowtime(' . $row['showtime_id'] . ')">Xóa</button></td>';
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
        <form action="showtime.php" method="POST" enctype="multipart/form-data">
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Thêm lịch chiếu</h1>
                    <div class="container">
                        <div class="form-row">
                            <div class="form-group half-width">
                            <label for="showtime">* Phim chiếu</label>
                            <select name="movie_id" required>
                                <option value="">Chọn phim</option>
                                <?php
                                // Lấy danh sách phim  từ cơ sở dữ liệu
                                $movieQuery = "SELECT * FROM movies";
                                $movieResult = $conn->query($movieQuery);
                                if ($movieResult->num_rows > 0) {
                                    while ($movieRow = $movieResult->fetch_assoc()) {
                                        echo '<option value="' . $movieRow['movie_id'] . '">' . $movieRow['title'] . '</option>'; 
                                    }
                                } else {
                                    echo '<option value="">Không có phim nào.</option>';
                                }
                                ?>
                            </select>
                            
                        </div>
                        
                    
                        <div class="form-row">
                            <div class="form-group half-width">
                            <label for="show_date">* Ngày chiếu</label>
                            <input type="date" name="show_date" required>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <button class="submit-btn" id="addMovieBtn" name ="addshowtime">Thêm lịch chiếu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    

    <!-- Sửa phim -->
    <script src="http://localhost/4scinema/admin/js/admin.js"></script>

    
</body>
</html>