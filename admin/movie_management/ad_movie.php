<?php 
include '../../user/db_connection.php';

function handleFileUpload($file, $destination) {
    if (isset($file) && $file['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $file['tmp_name'];
        $file_name = basename($file['name']);
        move_uploaded_file($tmp_name, $destination . $file_name);
        return $file_name;
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addmovie'])) {
    $title = $_POST['title'];
    $age_rating = $_POST['age_rating'];
    $trailer_url = $_FILES['trailer_url']['name'];
    $release_date = $_POST['release_date'];
    $image_url = $_FILES['image_url']['name'];
    $description_mv = $_POST['description'];
    $genre = $_POST['genre'];
    $status_mv = $_POST['status'];
    $subtitle = $_POST['subtitle'];
    $country = $_POST['country'];
    $duration = $_POST['duration'];
    $vietsub  = $_POST['vietsub'];


    // Xử lý upload file (trailer và image)
    move_uploaded_file($_FILES['trailer_url']['tmp_name'], "../../assets/trailer/" . $trailer_url);
    move_uploaded_file($_FILES['image_url']['tmp_name'], "../../assets/img/" . $image_url);
    
    // Chuẩn bị câu truy vấn SQL
    $stmt = $conn->prepare("INSERT INTO movies (title, genre, age_rating, release_date, country, subtitle, status_mv, description_mv, trailer_url, image_url, duration, vietsub) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $title, $genre, $age_rating, $release_date, $country, $subtitle, $status_mv, $description_mv, $trailer_url, $image_url, $duration, $vietsub);

    // Thực hiện câu truy vấn
    if ($stmt->execute()) {
        echo "Thêm phim thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

// Xoá phim
if (isset($_GET['delete'])) {
    $id_to_delete = intval($_GET['delete']);

    // xoá lịch chiếu liên quan
    $stmt_showtimes = $conn->prepare("DELETE FROM showtimes WHERE movie_id = ?");

    if ($stmt_showtimes === false) {
        die('Lỗi câu lệnh SQL: ' . htmlspecialchars($conn->error));
    }

    $stmt_showtimes->bind_param("i", $id_to_delete);
    if (!$stmt_showtimes->execute()) {
        echo "Lỗi xóa lịch chiếu: " . $stmt_showtimes->error;
    }

    $stmt_showtimes->close();

    //  xóa phim
    $stmt_movie = $conn->prepare("DELETE FROM movies WHERE movie_id = ?");

    if ($stmt_movie === false) {
        die('Lỗi câu lệnh SQL: ' . htmlspecialchars($conn->error));
    }

    $stmt_movie->bind_param("i", $id_to_delete);
    if ($stmt_movie->execute()) {
        echo "Xóa phim thành công!";
    } else {
        echo "Lỗi xóa phim: " . $stmt_movie->error;
    }

    $stmt_movie->close();
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
    <link rel="stylesheet" href="./ad_movie.css">
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
            
            <a href="../cinemas_management/cinemas.php">
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
                <h1> Danh sách phim</h1>
                <div>
                    <button class="add" id="createMovieBtn">
                        <i class="fas fa-plus"></i> 
                        Tạo phim
                    </button>
                    
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên phim</th>
                        <th>Thể loại</th>
                        <th>Ngày chiếu</th>
                        <th>Trạng thái</th>
                        <th>Trailer</th>
                        <th>Ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody id="movieList">
                    <?php
                    // Kết nối và truy xuất dữ liệu như đã mô tả ở trên
                    include '../../user/db_connection.php'; // Đường dẫn đến file kết nối cơ sở dữ liệu

                    // Lấy danh sách phim
                    $query = "SELECT * FROM movies"; 
                    $result = $conn->query($query);
                    $count = 1;

                    // Kiểm tra và hiển thị dữ liệu
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $count++ .  '</td>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['genre'] . '</td>';
                            echo '<td>' . $row['release_date'] . '</td>';
                            echo '<td>' . $row['status_mv'] . '</td>';
                            echo '<td><a href="../../assets/trailer/' . $row['trailer_url'] . '">Xem Trailer</a></td>';
                            echo '<td><img src="../../assets/img/' . $row['image_url'] . '" alt="Image" width="60"></td>';
                            echo '<td><button  class="edit" onclick="openEditModal(' . $row['movie_id'] . ')">Sửa</button>
                             <button class="delete" onclick="deleteMovie(' . $row['movie_id'] . ')">Xóa</button></td>';
                            echo '</td>';
                        }
                    } else {
                        echo '<tr><td colspan="8">Không có dữ liệu nào.</td></tr>';
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
     <form action="ad_movie.php" method="POST" enctype="multipart/form-data">
         <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Thêm phim</h1>
                <div class="container">
                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="name">* Tên phim</label>
                            <input type="text" name="title" placeholder="Enter name" >
                        </div>
                        <div class="form-group half-width">
                            <label for="age">* Độ tuổi xem phim</label>
                            <input type="text" name="age_rating" placeholder="Enter age">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="trailer">* Trailer</label>
                            <input type="file" name="trailer_url">
                        </div>
                        <div class="form-group half-width">
                            <label for="date">* Ngày chiếu</label>
                            <input type="date" name="release_date">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="image">* Ảnh</label>
                            <input type="file" name="image_url">
                        </div>
                        <div class="form-group half-width">
                            <label for="vietsub">Phụ đề</label>
                            <input type="text" name="vietsub" placeholder="Enter sub">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="description">* Mô tả</label>
                            <textarea name="description" placeholder="Enter description"></textarea>
                        </div>
                        <div class="form-group half-width">
                            <label for="description">* Nội dung phim</label>
                            <textarea name="subtitle" placeholder="Enter subtitle"></textarea>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="genres">Thể loại</label>
                            <input type="text" name="genre" id="editGenre" placeholder="Enter genres">
                        </div>
                        <div class="form-group half-width">
                            <label for="status">* Trạng thái</label>
                            <select name="status">
                                <option>Chọn trạng thái</option>
                                <option>Đang chiếu</option>
                                <option>Sắp chiếu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="duration">* Thời lượng phim (phút)</label>
                            <input type="text" name="duration" placeholder="Enter duration">
                        </div>
                        <div class="form-group half-width">
                            <label for="country">* Quốc gia</label>
                            <input type="text" name="country" placeholder="Enter country">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="submit-btn" id="addMovieBtn" name ="addmovie">Thêm phim</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    

    <!-- Sửa phim -->
    

    




    <script src="../js/admin.js"></script>
</body>
</html>