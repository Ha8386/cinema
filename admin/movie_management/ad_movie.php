<?php 
include '../../user/db_connection.php';

$search = isset($_GET['search']) ? addslashes($_GET['search']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addmovie'])) {
    // 1. Lấy dữ liệu
    $title        = $_POST['title'];
    $age_rating   = $_POST['age_rating'];
    $release_date = $_POST['release_date'];
    $description  = $_POST['description'];
    $genre        = $_POST['genre'];
    $status_mv    = $_POST['status'];
    $subtitle     = $_POST['subtitle'];
    $country      = $_POST['country'];
    $duration     = $_POST['duration'];
    $vietsub      = $_POST['vietsub'];

    // 2. Chuẩn bị tên file (nếu có) và upload
    $trailer_url = $_FILES['trailer_url']['name'] ?: null;
    if ($trailer_url) {
        move_uploaded_file($_FILES['trailer_url']['tmp_name'], "../../assets/trailer/$trailer_url");
    }
    $image_url = $_FILES['image_url']['name'] ?: null;
    if ($image_url) {
        move_uploaded_file($_FILES['image_url']['tmp_name'], "../../assets/img/$image_url");
    }

    // 3. Insert vào DB
    $stmt = $conn->prepare("
        INSERT INTO movies
        (title, genre, age_rating, release_date, country, subtitle, status_mv, description_mv, trailer_url, image_url, duration, vietsub)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param(
        "ssssssssssss",
        $title, $genre, $age_rating, $release_date, $country,
        $subtitle, $status_mv, $description, $trailer_url,
        $image_url, $duration, $vietsub
    );

    if ($stmt->execute()) {
        echo "<script>alert('Thêm phim thành công!');</script>";
        // nếu muốn reset form:
        $_POST = [];
    } else {
        echo "<script>alert('Lỗi DB: " . addslashes($stmt->error) . "');</script>";
    }

        $stmt->close();
    }

// Xoá phim
if (isset($_GET['delete'])) {
    $id_to_delete = $_GET['delete'];
    $stmt_showtimes = $conn->prepare("DELETE FROM showtimes WHERE movie_id = ?");
    $stmt_showtimes->bind_param("i", $id_to_delete);
    if (!$stmt_showtimes->execute()) {
        echo "Lỗi xóa lịch chiếu: " . $stmt_showtimes->error;
    }
    $stmt_showtimes->close();

    //  xóa phim
    $stmt_movie = $conn->prepare("DELETE FROM movies WHERE movie_id = ?");

   

    $stmt_movie->bind_param("i", $id_to_delete);
    if ($stmt_movie->execute()) {
        echo "Xóa phim thành công!";
    } else {
        echo "Lỗi xóa phim: " . $stmt_movie->error;
    }

    $stmt_movie->close();
}

// sửa phim
$editData = null;
$errors = [];

if (isset($_GET['edit'])) {
    $movie_id = $_GET['edit'];
    $query = "SELECT * FROM movies WHERE movie_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();  
    if ($row = $result->fetch_assoc()) {
        $editData = $row;
        $current_trailer = $editData['trailer_url'];
        $current_image = $editData['image_url'];
        $status_mv = $editData['status_mv'];
    }
    $stmt->close();
}


if (isset($_POST['updatemovie'])) {
    // Lấy dữ liệu từ form
    // Lấy dữ liệu từ form
    $title = $_POST['edit_title'];
    $age_rating = $_POST['edit_age_rating'];
    $release_date = $_POST['edit_release_date'];
    $vietsub = $_POST['edit_vietsub'];
    $description_mv = $_POST['edit_description'];
    $subtitle = $_POST['edit_subtitle'];
    $genre = $_POST['edit_genre'];
    $status_mv = $_POST['edit_status'];
    $duration = $_POST['edit_duration'];
    $country = $_POST['edit_country'];

    // Tiến hành cập nhật thông tin phim
    if (isset($_FILES['edit_trailer_url'])) {
        $trailer_url = $_FILES['edit_trailer_url']['name'];
        move_uploaded_file($_FILES['edit_trailer_url']['tmp_name'], "../../assets/trailer/" . $trailer_url);
    } else {
        $trailer_url = $editData['trailer_url'];
    }

    if (isset($_FILES['edit_image_url'])) {
        $image_url = $_FILES['edit_image_url']['name'];
        move_uploaded_file($_FILES['edit_image_url']['tmp_name'], "../../assets/img/" . $image_url);
    } else {
        $image_url = $editData['image_url'];
    }

    // Cập nhật thông tin phim vào cơ sở dữ liệu
    $stmt = $conn->prepare("UPDATE movies SET title = ?, age_rating = ?, release_date = ?, vietsub = ?, description_mv = ?, subtitle = ?, genre = ?, status_mv = ?, duration = ?, country = ?, trailer_url = ?, image_url = ? WHERE movie_id = ?");
    $stmt->bind_param("ssssssssssssi", $title, $age_rating, $release_date, $vietsub, $description_mv, $subtitle, $genre, $status_mv, $duration, $country, $trailer_url, $image_url, $movie_id);

    if ($stmt->execute()) {
        echo "<script>alert('Cập nhật phim thành công!');</script>";
        header("Location: ad_movie.php");
        exit;
    } else {
        echo "<script>alert('Có lỗi xảy ra khi cập nhật phim. Vui lòng thử lại!');</script>";
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
                <h1> Danh sách phim</h1>
                <div class="ad_nav">
                    <div class="ad_nav_item">
                        <button class="add" id="createMovieBtn">              
                            Tạo phim
                        </button>
                        <a href="ad_movie.php" class="reset-button">
                            <button>Hiển thị tất cả</button>
                        </a>
                    </div>        
                    <form action="ad_movie.php" method="get">
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
                    if (!empty($search)) {
                        // Nếu có tìm kiếm, thực hiện truy vấn
                        $query = "SELECT * FROM movies WHERE title LIKE '%$search%'";
                        $result = $conn->query($query);

                        if ($result && $result->num_rows > 0) {
                            $count = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $count++ . '</td>';
                                echo '<td>' . $row['title'] . '</td>';
                                echo '<td>' . $row['genre'] . '</td>';
                                echo '<td>' . $row['release_date'] . '</td>';
                                echo '<td>' . $row['status_mv'] . '</td>';
                                echo '<td><a href="../../assets/trailer/' . $row['trailer_url'] . '">Xem Trailer</a></td>';
                                echo '<td><img src="../../assets/img/' . $row['image_url'] . '" alt="Image" width="60"></td>';
                                echo '<td><button class="edit" onclick="editMovie(' . $row['movie_id'] . ')">Sửa</button>
                                    <button class="delete" onclick="deleteMovie(' . $row['movie_id'] . ')">Xóa</button></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="8">Không tìm thấy kết quả!</td></tr>';
                        }
                    } else {
                        // Nếu không có tìm kiếm, hiển thị danh sách tất cả phim
                        $query = "SELECT * FROM movies";
                        $result = $conn->query($query);
                        $count = 1;

                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $count++ . '</td>';
                                echo '<td>' . $row['title'] . '</td>';
                                echo '<td>' . $row['genre'] . '</td>';
                                echo '<td>' . $row['release_date'] . '</td>';
                                echo '<td>' . $row['status_mv'] . '</td>';
                                echo '<td><a href="../../assets/trailer/' . $row['trailer_url'] . '">Xem Trailer</a></td>';
                                echo '<td><img src="../../assets/img/' . $row['image_url'] . '" alt="Image" width="60"></td>';
                                echo '<td><button class="edit" onclick="editMovie(' . $row['movie_id'] . ')">Sửa</button>
                                    <button class="delete" onclick="deleteMovie(' . $row['movie_id'] . ')">Xóa</button></td>';
                                echo '</tr>';
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
    <form action="ad_movie.php" method="POST" enctype="multipart/form-data" id="addMovieForm">
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Thêm phim</h1>
            <div class="container">
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="name">* Tên phim</label>
                        <input
                            type="text"
                            name="title"
                            placeholder="Enter name"
                            required
                            value="<?= htmlspecialchars($_POST['title'] ?? '') ?>"
                        >
                    </div>
                    
                    <div class="form-group half-width">
                        <label for="age">* Độ tuổi xem phim</label>
                        <input
                            type="number"
                            name="age_rating"
                            placeholder="Enter age"
                            required
                            min="0" max="18"
                            oninvalid="this.setCustomValidity('Tuổi phải từ 0–18')"
                            oninput="this.setCustomValidity('')"
                            value="<?= htmlspecialchars($_POST['age_rating'] ?? '') ?>"
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="trailer">Trailer</label>
                        <input type="file" 
                                name="trailer_url" 
                                required
                                accept="video/*">
                    </div>
                    <div class="form-group half-width">
                        <label for="date">* Ngày chiếu</label>
                        <input
                            type="date"
                            name="release_date"
                            
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="image">Ảnh</label>
                        <input type="file" 
                                name="image_url" 
                                required
                                accept="image/*">
                    </div>
                    <div class="form-group half-width">
                        <label for="vietsub">Phụ đề</label>
                        <input
                            type="text"
                            name="vietsub"
                            placeholder="Enter sub"
                            value="<?= htmlspecialchars($_POST['vietsub'] ?? '') ?>"
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="description">* Nội dung phim</label>
                        <textarea
                            name="description"
                            placeholder="Enter description"
                            required
                        ><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                    </div>
                    <div class="form-group half-width">
                        <label for="subtitle">* Mô tả</label>
                        <textarea
                            name="subtitle"
                            placeholder="Enter subtitle"
                            required
                        ><?= htmlspecialchars($_POST['subtitle'] ?? '') ?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="genres">Thể loại</label>
                        <input
                            type="text"
                            name="genre"
                            id="editGenre"
                            required
                            placeholder="Enter genres"
                            value="<?= htmlspecialchars($_POST['genre'] ?? '') ?>"
                        >
                    </div>
                    <div class="form-group half-width">
                        <label for="status">* Trạng thái</label>
                        <select name="status" required>
                            <option value="">Chọn trạng thái</option>
                            <option value="Đang chiếu" <?= (($_POST['status'] ?? '') == 'Đang chiếu' ? 'selected' : '') ?>>Đang chiếu</option>
                            <option value="Sắp chiếu" <?= (($_POST['status'] ?? '') == 'Sắp chiếu' ? 'selected' : '') ?>>Sắp chiếu</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group half-width">
                        <label for="duration">* Thời lượng phim (phút)</label>
                        <input
                            type="number"
                            name="duration"
                            placeholder="Enter duration"
                            required
                            min="1" max="300"
                            oninvalid="this.setCustomValidity('Thời lượng 1–300 phút')"
                            oninput="this.setCustomValidity('')"
                            value="<?= htmlspecialchars($_POST['duration'] ?? '') ?>"
                        >
                    </div>
                    <div class="form-group half-width">
                        <label for="country">* Quốc gia</label>
                        <input
                            type="text"
                            name="country"
                            placeholder="Enter country"
                            required
                            value="<?= htmlspecialchars($_POST['country'] ?? '') ?>"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <button class="submit-btn" id="addMovieBtn" name="addmovie">Thêm phim</button>
                </div>
            </div>
        </div>
    </div>
</form>




    <!-- sửa phim -->
    <form id="editMovieForm" action="ad_movie.php?edit=<?php echo $editData['movie_id']; ?>" method="POST" enctype="multipart/form-data">
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Sửa phim</h1>
                <div class="container">
                    <div class="form-row">
                        <input type="hidden" name="movie_id" value="<?= htmlspecialchars($movie_id); ?>">

                        <div class="form-group half-width">
                            <label>* Tên phim</label>
                            <input
                                type="text"
                                name="edit_title"
                                placeholder="Enter name"
                                required
                                value="<?= htmlspecialchars($editData['title']); ?>"
                            >
                        </div>


                        <div class="form-group half-width">
                            <label>* Độ tuổi xem phim</label>
                            <input
                                type="number"
                                name="edit_age_rating"
                                placeholder="Enter age"
                                required
                                min="0" max="18"
                                oninvalid="this.setCustomValidity('Tuổi phải từ 0–18')"
                                oninput="this.setCustomValidity('')"
                                value="<?= htmlspecialchars($editData['age_rating']); ?>"
                            >
                        </div>
                    </div>  


                    <div class="form-row">
                        <div class="form-group half-width">
                            <label>* Trailer</label>
                            <input  
                                type="file"     
                                name="edit_trailer_url" 
                                required
                                accept="video/*"
                            >
                            <p>Trailer hiện tại: <?= htmlspecialchars($current_trailer); ?></p>
                        </div>


                        <div class="form-group half-width">
                            <label>* Ngày chiếu</label>
                            <input
                                type="date"
                                name="edit_release_date"
                                required
                                oninvalid="this.setCustomValidity('Vui lòng chọn ngày chiếu')"
                                oninput="this.setCustomValidity('')"
                                value="<?= htmlspecialchars($editData['release_date']); ?>"
                            >
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group half-width">
                            <label>* Ảnh</label>
                            <input 
                                    type="file" 
                                    name="edit_image_url" 
                                    required
                                    accept="image/*"
                            >
                            <p>Ảnh hiện tại: <?= htmlspecialchars($current_image); ?></p>
                        </div>


                        <div class="form-group half-width">
                            <label>Phụ đề</label>
                            <input
                                type="text"
                                name="edit_vietsub"
                                placeholder="Enter sub"
                                value="<?= htmlspecialchars($editData['vietsub']); ?>"
                            >
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group half-width">
                            <label>* Nội dung phim</label>
                            <textarea
                                name="edit_description"
                                placeholder="Enter description"
                                required
                                oninvalid="this.setCustomValidity('Vui lòng nhập nội dung phim')"
                                oninput="this.setCustomValidity('')"
                            ><?= htmlspecialchars($editData['description_mv']); ?></textarea>
                        </div>


                        <div class="form-group half-width">
                            <label>* Mô tả</label>
                            <textarea
                                name="edit_subtitle"
                                placeholder="Enter subtitle"
                                required
                                oninvalid="this.setCustomValidity('Vui lòng nhập mô tả')"
                                oninput="this.setCustomValidity('')"
                            ><?= htmlspecialchars($editData['subtitle']); ?></textarea>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group half-width">
                            <label>Thể loại</label>
                            <input
                                type="text"
                                name="edit_genre"
                                required
                                placeholder="Enter genres"
                                value="<?= htmlspecialchars($editData['genre']); ?>"
                            >
                        </div>


                        <div class="form-group half-width">
                            <label>* Trạng thái</label>
                            <select
                                name="edit_status"
                                required
                                oninvalid="this.setCustomValidity('Vui lòng chọn trạng thái')"
                                oninput="this.setCustomValidity('')"
                            >
                                <option value="">Chọn trạng thái</option>
                                <option value="Đang chiếu" <?= ($editData['status_mv'] === 'Đang chiếu') ? 'selected' : ''; ?>>Đang chiếu</option>
                                <option value="Sắp chiếu" <?= ($editData['status_mv'] === 'Sắp chiếu') ? 'selected' : ''; ?>>Sắp chiếu</option>
                            </select>
                            <?php if (isset($errors['edit_status'])): ?>
                                <div class="error"><?php echo $errors['edit_status']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group half-width">
                            <label>* Thời lượng phim (phút)</label>
                            <input
                                type="number"
                                name="edit_duration"
                                placeholder="Enter duration"
                                required
                                min="1" max="300"
                                oninvalid="this.setCustomValidity('Thời lượng phải từ 1–300')"
                                oninput="this.setCustomValidity('')"
                                value="<?= htmlspecialchars($editData['duration']); ?>"
                            >
                        </div>


                        <div class="form-group half-width">
                            <label>* Quốc gia</label>
                            <input
                                type="text"
                                name="edit_country"
                                placeholder="Enter country"
                                required
                                oninvalid="this.setCustomValidity('Vui lòng nhập quốc gia')"
                                oninput="this.setCustomValidity('')"
                                value="<?= htmlspecialchars($editData['country']); ?>"
                            >
                        </div>
                    </div>


                    <div class="form-group">
                        <button class="submit-btn" name="updatemovie">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script src="../js/admin.js"></script>
</body>
</html>