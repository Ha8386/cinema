<?php 
include '../../user/db_connection.php';

$search = isset($_GET['search']) ? addslashes($_GET['search']) : '';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addpromotion'])) {
    

    $promotion_name = $_POST['promotion_name'];
    $details = $_POST['details'];
    $notes = $_POST['notes'];
    $image_url = $_FILES['image_url']['name']; // Lưu tên file hình ảnh
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // Upload file hình ảnh
    move_uploaded_file($_FILES['image_url']['tmp_name'], "../../assets/img/" . $image_url);
    
    
        // Chuẩn bị câu truy vấn SQL
        $stmt = $conn->prepare("INSERT INTO promotion (promotion_name, details, notes, discount_image, start_time, end_time) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss",  $promotion_name, $details, $notes, $image_url, $start_time, $end_time);

        // Thực hiện câu truy vấn
        if ($stmt->execute()) {
            echo "Thêm ưu đãi thành công!";
        } else {
            echo "Lỗi: " . $stmt->error;
        }

        $stmt->close();
        
    
}
// xoá ưu đãi
if (isset($_GET['delete'])) {
    $id_to_delete = intval(trim($_GET['delete']));

    // Chuẩn bị câu truy vấn xóa
    $stmt = $conn->prepare("DELETE FROM promotion WHERE id = ?");

    if ($stmt === false) {
        die('Lỗi câu lệnh SQL: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $id_to_delete);

    // Thực hiện câu truy vấn
    if ($stmt->execute()) {
        echo "Xóa ưu đãi thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

// sửa
$editData = null;

// Lấy thông tin ưu đãi nếu có ID trong URL
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $query = "SELECT * FROM promotion WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();  
    if ($row = $result->fetch_assoc()) {
        $editData = $row;
        
        
        $current_image = $editData['discount_image'];
      
    }
   
    $stmt->close();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editpromotion'])) {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];
    $promotion_name = $_POST['edit_promotion_name'];
    $details = $_POST['edit_details'];
    $notes = $_POST['edit_notes'];
    $start_time = $_POST['edit_start_time'];
    $end_time = $_POST['edit_end_time'];

    if (isset($_FILES['edit_image_url']) && $_FILES['edit_image_url']['error'] == UPLOAD_ERR_OK) {
        $image_url = $_FILES['edit_image_url']['name'];
        move_uploaded_file($_FILES['edit_image_url']['tmp_name'], "../../assets/img/" . $image_url);
    } else {
        $image_url = $editData['discount_image']; // Giữ lại image cũ nếu không có file mới
    }
    // cập nhật
    $stmt = $conn->prepare("UPDATE promotion SET promotion_name = ?, details = ?, notes = ?, discount_image = ?, start_time = ?, end_time = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $promotion_name, $details, $notes, $image_url, $start_time, $end_time, $id);

    if ($stmt->execute()) {
        $editData = null;
        echo "<script>alert('Cập nhật ưu đãi thành công!');</script>";
        header("Location: ad_promotion.php");
        exit;
    } else {
        echo "<script>alert('Có lỗi xảy ra khi cập nhật ưu đãi. Vui lòng thử lại!');</script>";
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
                <h1> Danh sách ưu đãi</h1>
                <div class="ad_nav">
                    <div class="ad_nav_item">

                        <button class="add" id="createMovieBtn">
                            <i class="fas fa-plus"></i> 
                            Tạo ưu đãi
                        </button>
                        <a href="ad_promotion.php" class="reset-button">
                            <button>Hiển thị tất cả</button>
                        </a>
                    </div>
                    
                    <form action="ad_promotion.php" method="get">
                        <input type="text" name="search" required placeholder="Nhập dữ liệu"  value="<?php echo htmlspecialchars($search); ?>"/>
                        <input type="submit" name="ok" value="search" />
                    </form>
                    
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên ưu đãi</th>
                        <th>Chi tiết</th>
                        <th>Ảnh </th>
                        <th>Bắt đầu</th>
                        <th>Kết thúc</th>
                        <th>Hành động</th>
                        
                    </tr>
                </thead>
                <tbody id="promotionList">
                    <?php
                    if (!empty($search)) {
                        // Nếu có tìm kiếm, thực hiện truy vấn
                        $query = "SELECT * FROM promotion WHERE promotion_name LIKE '%$search%'";
                        $result = $conn->query($query);
                        $count=1;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $count++ .  '</td>';
                                echo '<td style="width:250px">' . $row['promotion_name'] . '</td>';
                                echo '<td style="width:280px">' . $row['details'] . '</td>';
                                echo '<td><img src="../../assets/img/' . $row['discount_image'] . '" alt="Image" width="60"></td>';
                                echo '<td>' . $row['start_time'] . '</td>';
                                echo '<td>' . $row['end_time'] . '</td>';
                                echo '<td><button  class="edit" onclick="editPromotion(' . $row['id'] . ')">Sửa</button>
                                <button class="delete" onclick="deletePromotion(' . $row['id'] . ')">Xóa</button></td>';
                                echo '</td>';
                            }
                        } else {
                            echo '<tr><td colspan="8">Không có dữ liệu nào.</td></tr>';
                        }
                    }else {

                        // Lấy danh sách ưu đãi
                        $query = "SELECT * FROM promotion"; 
                        $result = $conn->query($query);
                        $count = 1;
    
                        // Kiểm tra và hiển thị dữ liệu
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $count++ .  '</td>';
                                echo '<td style="width:250px">' . $row['promotion_name'] . '</td>';
                                echo '<td style="width:280px">' . $row['details'] . '</td>';
                                echo '<td><img src="../../assets/img/' . $row['discount_image'] . '" alt="Image" width="60"></td>';
                                echo '<td>' . $row['start_time'] . '</td>';
                                echo '<td>' . $row['end_time'] . '</td>';
                                echo '<td><button  class="edit" onclick="editPromotion(' . $row['id'] . ')">Sửa</button>
                                <button class="delete" onclick="deletePromotion(' . $row['id'] . ')">Xóa</button></td>';
                                echo '</td>';
                            }
                        } else {
                            echo '<tr><td colspan="8">Không có dữ liệu nào.</td></tr>';
                        }
                    }
                    ?>
                </tbody>

            </table>
            
        </div>
    </div>
           
     <!-- The Modal -->
        <form action="ad_promotion.php" method="POST" enctype="multipart/form-data">
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Thêm ưu đãi</h1>
                    <div class="container">
                        <div class="form-row">
                            <div class="form-group half-width">
                                <label for="promotion_name">* Tên ưu đãi</label>
                                <input type="text" name="promotion_name" required>
                            </div>
                            <div class="form-group half-width">
                                <label for="image_url">* Hình ảnh</label>
                                <input type="file" name="image_url"  required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group half-width">
                                <label for="details">* Chi tiết</label>
                                <textarea name="details" required></textarea>
                            </div>
                            <div class="form-group half-width">
                                <label for="notes">Ghi chú</label>
                                <textarea name="notes"></textarea>
                            </div>
                        </div>


                        

                        <div class="form-row">
                            <div class="form-group half-width">
                                <label for="start_time">* Thời gian bắt đầu</label>
                                <input type="date" name="start_time" required>
                            </div>
                            <div class="form-group half-width">
                                <label for="end_time">* Thời gian kết thúc</label>
                                <input type="date" name="end_time" required>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <button class="submit-btn" id="addMovieBtn" name ="addpromotion">Thêm ưu đãi</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    

    <!-- Sửa phim -->
    <form action="ad_promotion.php?edit=<?php echo $editData ? $editData['id'] : ''; ?>" method="POST" enctype="multipart/form-data">
            <div id="editModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Sửa ưu đãi</h1>
                    <div class="container">
                        <div class="form-row">
                        <input type="hidden" name="id" value="<?php echo   $id ; ?>">
                            <div class="form-group half-width">
                                <label for="promotion_name">* Tên ưu đãi</label>
                                <input type="text" name="edit_promotion_name" required value="<?php echo   isset($editData['promotion_name']) ? htmlspecialchars($editData['promotion_name']) : ''; ?>">
                            </div>
                            <div class="form-group half-width">
                                <label for="image_url">* Hình ảnh</label>
                                <input type="file" name="edit_image_url"  required >
                                <p id="current_image">Ảnh hiện tại: <?php echo htmlspecialchars($current_image); ?></p>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group half-width">
                                <label for="details">* Chi tiết</label>
                                <textarea name="edit_details" required><?php echo $editData ? htmlspecialchars($editData['details']) : ''; ?></textarea>
                            </div>
                            <div class="form-group half-width">
                                <label for="notes">Ghi chú</label>
                                <textarea name="edit_notes"><?php echo $editData ? htmlspecialchars($editData['notes']) : ''; ?></textarea>
                            </div>
                        </div>


                        

                        <div class="form-row">
                            <div class="form-group half-width">
                                <label for="start_time">* Thời gian bắt đầu</label>
                                <input type="date" name="edit_start_time" required value="<?php echo $editData ? htmlspecialchars($editData['start_time']) : 'null'; ?>">
                            </div>
                            <div class="form-group half-width">
                                <label for="end_time">* Thời gian kết thúc</label>
                                <input type="date" name="edit_end_time" required value="<?php echo $editData ? htmlspecialchars($editData['end_time']) : 'null'; ?>">
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <button class="submit-btn" id="addMovieBtn" name ="editpromotion">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    <script src="../js/admin.js"></script>

    
</body>
</html>