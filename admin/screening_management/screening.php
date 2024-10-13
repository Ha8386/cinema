<?php 
include '../../user/db_connection.php';
$search = isset($_GET['search']) ? addslashes($_GET['search']) : '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addscreen'])) {
    $showtime_id = $_POST['showtime_id'];
    $screening_times = $_POST['screening_time']; // Lưu ý đây là một mảng

    // Lặp qua từng suất chiếu và thêm vào cơ sở dữ liệu
    foreach ($screening_times as $screening_time) {
        // Chuẩn bị câu truy vấn SQL
        $stmt = $conn->prepare("INSERT INTO screenings (showtime_id, screening_time) VALUES (?, ?)");
        $stmt->bind_param("is", $showtime_id, $screening_time);

        // Thực hiện câu truy vấn
        if (!$stmt->execute()) {
            echo "Lỗi: " . $stmt->error;
        }
    }

    echo "Thêm suất chiếu thành công!";
    $stmt->close();
}


// Xoá phim
if (isset($_GET['delete'])) {
    $id_to_delete = intval(trim($_GET['delete']));

    // Chuẩn bị câu truy vấn xóa
    $stmt = $conn->prepare("DELETE FROM screenings WHERE showtime_id = ?");

    if ($stmt === false) {
        die('Lỗi câu lệnh SQL: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $id_to_delete);

    // Thực hiện câu truy vấn
    if ($stmt->execute()) {
        echo "Xóa suất chiếu thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

// sửa phim
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editscreening'])) {
    // Kết nối cơ sở dữ liệu
    $showtime_id = $_POST['showtime_id'];
    $new_screen_time = $_POST['new_screening_time']; // Mảng chứa các suất mới

    
    // Lấy lịch chiếu cũ từ cơ sở dữ liệu
    $query = "SELECT screening_time FROM screenings WHERE showtime_id = $showtime_id";
    $result = $conn->query($query);
    $oldScreens = [];
    while ($row = $result->fetch_assoc()) {
        $oldScreens[] = $row['screening_time'];
    }

    // Tạo danh sách suất chiếu mới và cũ
    $updatedScreen = array_unique($new_screen_time); // Loại bỏ trùng lặp

    // Xóa suất chiếu không còn trong danh sách mới
    foreach ($oldScreens as $oldScreen) {
        if (!in_array($oldScreen, $updatedScreen)) {
            $deleteQuery = "DELETE FROM screenings WHERE showtime_id = $showtime_id AND screening_time = '$oldScreen'";
            $conn->query($deleteQuery);
        }
    }

    // Thêm suất chiếu mới vào cơ sở dữ liệu
    foreach ($updatedScreen as $newScreen) {
        if (!in_array($newScreen, $oldScreens)) {
            $insertQuery = "INSERT INTO screenings (showtime_id, screening_time) VALUES ($showtime_id, '$newScreen')";
            $conn->query($insertQuery);
        }
    }
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
                <h1> Danh sách suất chiếu</h1>
                <div class="ad_nav">
                    <div class="ad_nav_item">

                        <button class="add" id="createMovieBtn">
                            <i class="fas fa-plus"></i> 
                            Tạo suất chiếu
                        </button>
                        <a href="screening.php" class="reset-button">
                            <button>Hiển thị tất cả</button>
                        </a>
                    </div>
                    
                    <form action="screening.php" method="get">
                        <input type="text" name="search" required placeholder="Nhập dữ liệu"  value="<?php echo htmlspecialchars($search); ?>"/>
                        <input type="submit" name="ok" value="search" />
                    </form>
                    
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Lịch chiếu</th>
                        <th style="text-align: center;">Suất chiếu</th>
                        <th>Hành động</th>
                        
                    </tr>
                </thead>
                <tbody id="showtimeList">
                    <?php
                    if (!empty($search)) {
                        // Nếu có tìm kiếm, thực hiện truy vấn
                       
                        $query = "
                            SELECT showtimes.showtime_id, showtimes.show_date, 
                                GROUP_CONCAT(screenings.screening_time ORDER BY screenings.screening_time SEPARATOR ', ') AS screening_times
                            FROM showtimes
                            LEFT JOIN screenings ON screenings.showtime_id = showtimes.showtime_id
                            WHERE showtimes.show_date LIKE '%$search%'
                            GROUP BY showtimes.showtime_id
                            HAVING COUNT(screenings.screening_time) > 0
                        "; 
                        $result = $conn->query($query); 
                        $count = 1;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $count++ .  '</td>';
                                echo '<td>' . $row['show_date'] . '</td>';
                                 // Tách các suất chiếu và thêm border
                                $screening_times = explode(', ', $row['screening_times']);
                                echo '<td style="width:670px; display: flex; flex-wrap: wrap; gap: 10px">';
                                foreach ($screening_times as $time) {
                                    echo '<div class="screening-button">' . $time . '</div>';
                                }
                                echo '</td>';
                                echo '<td><button class="edit" onclick="editScreening(' . $row['showtime_id'] . ', \'' . $row['screening_times'] . '\')">Sửa</button>
                                    <button class="delete" onclick="deleteScreen(' . $row['showtime_id'] . ')">Xóa</button></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4">Không có dữ liệu nào.</td></tr>';
                        }
                    }else {

                        // Lấy danh sách suất chiếu
                        $query = "
                                SELECT showtimes.showtime_id, showtimes.show_date, GROUP_CONCAT(screenings.screening_time ORDER BY screenings.screening_time SEPARATOR ', ') AS screening_times
                                FROM showtimes
                                LEFT JOIN screenings ON screenings.showtime_id = showtimes.showtime_id
                                GROUP BY showtimes.showtime_id
                                HAVING COUNT(screenings.screening_time) > 0
                            "; 
                        $result = $conn->query($query); 
                        $count = 1;
                        // Kiểm tra và hiển thị dữ liệu
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $count++ .  '</td>';
                                echo '<td>' . $row['show_date'] . '</td>';
                                 // Tách các suất chiếu và thêm border
                                $screening_times = explode(', ', $row['screening_times']);
                                echo '<td style="width:670px; display: flex; flex-wrap: wrap; gap: 10px">';
                                foreach ($screening_times as $time) {
                                    echo '<div class="screening-button">' . $time . '</div>';
                                }
                                echo '</td>';
                                echo '<td><button class="edit" onclick="openEdit(' . $row['showtime_id'] . ', \'' . $row['screening_times'] . '\')">Sửa</button>
                                    <button class="delete" onclick="deleteScreen(' . $row['showtime_id'] . ')">Xóa</button></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4">Không có dữ liệu nào.</td></tr>';
                        }
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
        <form action="screening.php" method="POST" enctype="multipart/form-data">
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Thêm suất chiếu</h1>
                    <div class="container">
                        <div class="form-row">
                            <div class="form-group half-width">
                                <label for="showtime">* Lịch chiếu</label>
                                <select name="showtime_id" required>
                                    <option value="">Chọn </option>
                                    <?php
                                    // Lấy danh sách lịch  từ cơ sở dữ liệu
                                    $movieQuery = "SELECT * FROM showtimes";
                                    $movieResult = $conn->query($movieQuery);
                                    if ($movieResult->num_rows > 0) {
                                        while ($movieRow = $movieResult->fetch_assoc()) {
                                            echo '<option value="' . $movieRow['showtime_id'] . '">' . $movieRow['show_date'] . '</option>'; 
                                        }
                                    } else {
                                        echo '<option value="">Không có lịch chiếu nào.</option>';
                                    }
                                    ?>
                                </select>
                            
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group half-width">
                                <div id="screeningInputs">
                                    <div class="screen-hd">
                                        * Suất chiếu
                                        <button style="width: 120px; height:60px; " type="button" onclick="addScreeningInput()">Thêm suất chiếu</button>
                                    </div>
                                    
                                        <input style="width:100px" type="time" name="screening_time[]" required>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button class="submit-btn" id="addMovieBtn" name ="addscreen">Thêm suất chiếu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    

    <!-- Sửa phim -->
    <form action="screening.php" method="POST" enctype="multipart/form-data">
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Sửa suất chiếu</h1>
                <input type="hidden" name="showtime_id" id="showtime_id">
                
                <div class="form-row">
                    <div class="form-group half-width" style="font-size: 16px;">
                        <label for="show_date">* Lịch chiếu</label>
                        <input type="text" id="show_date" name="show_date" readonly>
                    </div>
                </div>
                <label style="text-align: center;" for="show_date">
                    <h2>* Suất chiếu</h2>
                </label>
                <div class="form-row" id="screeningtimes" style="font-size: 14px;gap: 20px; flex-wrap: wrap; justify-content: start">
                    <!-- Các ô input ngày chiếu sẽ được thêm vào đây -->
                </div>

                <div class="form-group" style="margin-top: 36px;">
                <button class="submit-btn" id="addMovieBtn" name ="editscreening">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>
    <script src="http://localhost/4scinema/admin/js/admin.js"></script>

    
</body>
</html>