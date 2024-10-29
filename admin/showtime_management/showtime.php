<?php 
include '../../user/db_connection.php';

$search = isset($_GET['search']) ? addslashes($_GET['search']) : '';
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

// Xoá 
if (isset($_GET['delete'])) {
    $id_to_delete = intval(trim($_GET['delete']));

    // Chuẩn bị câu truy vấn xóa
    $stmt = $conn->prepare("DELETE FROM showtimes WHERE movie_id = ?");

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

// sửa 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editshowtime'])) {
    // Kết nối cơ sở dữ liệu
    $movie_id = $_POST['movie_id'];
    $new_show_dates = $_POST['new_show_date']; // Mảng chứa các ngày mới

    
    // Lấy lịch chiếu cũ từ cơ sở dữ liệu
    $query = "SELECT show_date FROM showtimes WHERE movie_id = $movie_id";
    $result = $conn->query($query);
    $oldDates = [];
    while ($row = $result->fetch_assoc()) {
        $oldDates[] = $row['show_date'];
    }

    // Tạo danh sách lịch chiếu mới và cũ
    $updatedDates = array_unique($new_show_dates); // Loại bỏ trùng lặp

    // Xóa lịch chiếu không còn trong danh sách mới
    foreach ($oldDates as $oldDate) {
        if (!in_array($oldDate, $updatedDates)) {
            $deleteQuery = "DELETE FROM showtimes WHERE movie_id = $movie_id AND show_date = '$oldDate'";
            $conn->query($deleteQuery);
        }
    }

    // Thêm lịch chiếu mới vào cơ sở dữ liệu
    foreach ($updatedDates as $newDate) {
        if (!in_array($newDate, $oldDates)) {
            $insertQuery = "INSERT INTO showtimes (movie_id, show_date) VALUES ($movie_id, '$newDate')";
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
                <h1> Danh sách lịch chiếu</h1>
                <div class="ad_nav">
                    <div class="ad_nav_item">

                        <button class="add" id="createMovieBtn">
                            Tạo lịch chiếu
                        </button>
                        <a href="showtime.php" class="reset-button">
                            <button>Hiển thị tất cả</button>
                        </a>
                    </div>
                    
                    <form action="showtime.php" method="get">
                        <input type="text" name="search" required placeholder="Nhập dữ liệu"  value="<?php echo htmlspecialchars($search); ?>"/>
                        <input type="submit" name="ok" value="search" />
                    </form>
                    
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
                   if (!empty($search)) {
                    // Nếu có tìm kiếm, thực hiện truy vấn
                    $query = "SELECT movies.movie_id, movies.title, GROUP_CONCAT(DISTINCT showtimes.show_date ORDER BY showtimes.show_date SEPARATOR ', ') AS show_dates 
                            FROM showtimes 
                            JOIN movies ON showtimes.movie_id = movies.movie_id 
                            WHERE movies.title LIKE '%$search%' 
                            GROUP BY movies.movie_id
                            HAVING COUNT(showtimes.show_date) > 0 "; 
                    $result = $conn->query($query);
                    if (!$result) {
                        die("Query failed: " . $conn->error); // Kiểm tra lỗi
                    }
                    $count = 1;

                    // Kiểm tra và hiển thị dữ liệu
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $count++ .  '</td>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td style="width:670px; display: flex; flex-wrap: wrap; gap: 10px;">';
                    
                            // Tách các ngày chiếu và thêm border
                            $show_dates = explode(', ', $row['show_dates']);
                            foreach ($show_dates as $date) {
                                echo '<div class="showtime-button">' . $date . '</div>';
                            }
                            echo '</td>';
                            echo '<td><button  class="edit" onclick="openEditModal(' . $row['movie_id'] . ' , \'' . $row['show_dates'] . '\')">Sửa</button>
                            <button class="delete" onclick="deleteShowtime(' . $row['movie_id'] . ')">Xóa</button></td>';
                            echo '</td>';
                        }
                    } else {
                        echo '<tr><td colspan="4">Không có dữ liệu nào.</td></tr>';
                    }
                   }else {

                       // Lấy danh sách lịch chiếu
                       $query = "SELECT movies.movie_id, movies.title,  GROUP_CONCAT(DISTINCT showtimes.show_date ORDER BY showtimes.show_date SEPARATOR ', ') AS show_dates 
                                FROM showtimes 
                                JOIN movies ON showtimes.movie_id = movies.movie_id 
                                GROUP BY movies.movie_id
                                HAVING COUNT(showtimes.show_date) > 0 ";
                       $result = $conn->query($query);
                       if (!$result) {
                        die("Query failed: " . $conn->error); // Kiểm tra lỗi
                    }
                       $count = 1;
   
                       // Kiểm tra và hiển thị dữ liệu
                       if ($result->num_rows > 0) {
                           while ($row = $result->fetch_assoc()) {
                               echo '<tr>';
                               echo '<td>' . $count++ .  '</td>';
                               echo '<td>' . $row['title'] . '</td>';
                               echo '<td style="width:670px; display: flex; flex-wrap: wrap; gap: 10px;">';
                    
                                // Tách các ngày chiếu và thêm border
                                $show_dates = explode(', ', $row['show_dates']);
                                foreach ($show_dates as $date) {
                                    echo '<div class="showtime-button">' . $date . '</div>';
                                }
                                echo '</td>';
                               echo '<td><button class="edit" onclick="openEditModal(' . $row['movie_id']  . ', \'' . $row['show_dates'] . '\')">Sửa</button>
                               <button class="delete" onclick="deleteShowtime(' . $row['movie_id'] . ')">Xóa</button></td>';
                               echo '</td>';
                           }
                       } else {
                           echo '<tr><td colspan="4">Không có dữ liệu nào.</td></tr>';
                       }
                   }
                    ?>
                </tbody>

            </table>
           
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
    <form action="showtime.php" method="POST" enctype="multipart/form-data">
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Sửa lịch chiếu</h1>
                <input type="hidden" name="movie_id" id="movie_id">
                
                <div class="form-row">
                    <div class="form-group half-width" style="font-size: 16px;">
                        <label for="movie_title">* Phim chiếu</label>
                        <input type="text" id="movie_title" name="movie_title" readonly>
                    </div>
                </div>
                <label style="text-align: center;" for="movie_title">
                    <h2>* Lịch chiếu</h2>
                </label>
                <div class="form-row" id="showingDates" style="font-size: 14px;gap: 20px; flex-wrap: wrap; justify-content: start">
                    <!-- Các ô input ngày chiếu sẽ được thêm vào đây -->
                </div>

                <div class="form-group" style="margin-top: 36px;">
                <button class="submit-btn" id="addMovieBtn" name ="editshowtime">Cập nhật</button>
                </div>
            </div>
        </div>
    </form>

    <script src="../js/admin.js"></script>

    
</body>
</html>