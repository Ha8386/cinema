<?php 
include '../../user/db_connection.php';
$search = isset($_GET['search']) ? addslashes($_GET['search']) : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addemployee'])) {
    

     $employee_name = $_POST['employee_name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $address = $_POST['address_nv'];
     $position = $_POST['position'];
     $hire_date = $_POST['hire_date'];
     $salary = $_POST['salary'];
 
     // Chuẩn bị câu lệnh SQL để thêm nhân viên
     $stmt = $conn->prepare("INSERT INTO employees (employee_name, email, phone, address_nv, position, hire_date, salary) VALUES (?, ?, ?, ?, ?, ?, ?)");
     $stmt->bind_param("ssssssi", $employee_name, $email, $phone, $address, $position, $hire_date, $salary); // "ssssssi" là định dạng cho các tham số
 
     // Thực thi câu lệnh và kiểm tra
     if ($stmt->execute()) {
         echo "Nhân viên đã được thêm thành công!";
     } else {
         echo "Lỗi: " . $stmt->error;
     }

        $stmt->close();
        
    
}
// xoá ưu đãi
if (isset($_GET['delete'])) {
    $id_to_delete = intval(trim($_GET['delete']));

    // Chuẩn bị câu truy vấn xóa
    $stmt = $conn->prepare("DELETE FROM employees WHERE id = ?");

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

// sửa  thông tin nhân viên

$editData = null;

// Lấy thông tin phim nếu có ID trong URL
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $query = "SELECT * FROM employees WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();  
    if ($row = $result->fetch_assoc()) {
        $editData = $row;
        
       
      
    }
   
    $stmt->close();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editemployee'])) {
    // Lấy dữ liệu từ form
    $id = $_POST['id'];
    $employee_name = $_POST['edit_employee_name'];
    $email = $_POST['edit_email'];
    $phone = $_POST['edit_phone'];
    $address = $_POST['edit_address_nv'];
    $position = $_POST['edit_position'];
    $hire_date = $_POST['edit_hire_date'];
    $salary = $_POST['edit_salary'];

    // Cập nhật thông tin nhân viên trong cơ sở dữ liệu
    $sql = "UPDATE employees SET 
                employee_name = ?, 
                email = ?, 
                phone = ?, 
                address_nv = ?, 
                position = ?, 
                hire_date = ?, 
                salary = ? 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $employee_name, $email, $phone, $address, $position, $hire_date, $salary, $id);

    if ($stmt->execute()) {
        $editData = null;
        echo "<script>alert('Cập nhật phim thành công!');</script>";
        header("Location: employees.php");
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
                <h1> Danh sách nhân viên</h1>
                <div class="ad_nav">
                    <div class="ad_nav_item">

                        <button class="add" id="createMovieBtn">
                            Tạo nhân viên
                        </button>
                        <a href="employees.php" class="reset-button">
                            <button>Hiển thị tất cả</button>
                        </a>
                    </div>
                    
                    <form action="employees.php" method="get">
                        <input type="text" name="search" required placeholder="Nhập dữ liệu"  value="<?php echo htmlspecialchars($search); ?>"/>
                        <input type="submit" name="ok" value="search" />
                    </form>
                    
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên nhân viên</th>
                        <th>Email</th>
                        <th>Số điện thoại </th>
                        <th>Địa chỉ</th>
                        <th>Phân quyền</th>
                        <th>Ngày vào làm</th>
                        <th>Tiền lương</th>
                        <th>Hành động</th>
                        
                    </tr>
                </thead>
                <tbody id="promotionList">
                    <?php
                    
                     if (!empty($search)) {
                        // Nếu có tìm kiếm, thực hiện truy vấn
                        $query = "SELECT * FROM employees WHERE employee_name LIKE '%$search%'";
                        $result = $conn->query($query);
                        $count=1;
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $count++ .  '</td>';
                                echo '<td>' . $row['employee_name'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['phone'] . '</td>';
                                echo '<td>' . $row['address_nv'] . '</td>';
                                echo '<td>' . $row['position'] . '</td>';
                                echo '<td>' . $row['hire_date'] . '</td>';
                                echo '<td>' . $row['salary'] . '</td>';
                                echo '<td><button  class="edit" onclick="openEditModal(' . $row['id'] . ')">Sửa</button>
                                <button class="delete" onclick="deleteEmployee(' . $row['id'] . ')">Xóa</button></td>';
                                echo '</td>';
                            }
                        } else {
                            echo '<tr><td colspan="9">Không có dữ liệu nào.</td></tr>';
                        }
                     }else {

                         // Lấy danh sách ưu đãi
                         $query = "SELECT * FROM employees"; 
                         $result = $conn->query($query);
                         $count = 1;
     
                         // Kiểm tra và hiển thị dữ liệu
                         if ($result->num_rows > 0) {
                             while ($row = $result->fetch_assoc()) {
                                 echo '<tr>';
                                 echo '<td>' . $count++ .  '</td>';
                                 echo '<td>' . $row['employee_name'] . '</td>';
                                 echo '<td>' . $row['email'] . '</td>';
                                 echo '<td>' . $row['phone'] . '</td>';
                                 echo '<td>' . $row['address_nv'] . '</td>';
                                 echo '<td>' . $row['position'] . '</td>';
                                 echo '<td>' . $row['hire_date'] . '</td>';
                                 echo '<td>' . $row['salary'] . '</td>';
                                 echo '<td><button  class="edit" onclick="editEmployee(' . $row['id'] . ')">Sửa</button>
                                 <button class="delete" onclick="deleteEmployee(' . $row['id'] . ')">Xóa</button></td>';
                                 echo '</td>';
                             }
                         } else {
                             echo '<tr><td colspan="9">Không có dữ liệu nào.</td></tr>';
                         }
                     }
                    ?>
                </tbody>

            </table>
           
        </div>
    </div>
           
     <!-- The Modal -->
        <form action="employees.php" method="POST" enctype="multipart/form-data">
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Thêm nhân viên</h1>
                    <div class="container">
                        <div class="form-row">
                            <div class="form-group half-width">
                                <label >* Tên nhân viên</label>
                                <input type="text" name="employee_name" required>
                            </div>
                            <div class="form-group half-width">
                                <label >* Email</label>
                                <input type="email" name="email"  required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group half-width">
                                <label >* Số điện thoại</label>
                                <input type="text" name="phone" required></input>
                            </div>
                            <div class="form-group half-width">
                                <label >* Địa chỉ</label>
                                <input type="text" name="address_nv" required></input>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group half-width">
                                <label >* Phân quyền</label>
                                <input type="text" name="position" required>
                            </div>
                            <div class="form-group half-width">
                                <label for="end_time">* Ngày vào làm</label>
                                <input type="date" name="hire_date" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group half-width">
                                <label for="end_time">* Tiền lương</label>
                                <input type="number" name="salary" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="submit-btn" id="addMovieBtn" name ="addemployee">Thêm nhân viên</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- sửa  -->
        <form action="employees.php?edit=<?php echo $editData ? $editData['id'] : ''; ?>" method="POST" enctype="multipart/form-data">
            <div id="editModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Sửa thông tin nhân viên</h1>
                    <div class="container">
                    <input type="hidden" name="id" value="<?php echo   $id ; ?>">
                        <div class="form-row">
                            <div class="form-group half-width">
                                <label >* Tên nhân viên</label>
                                <input type="text" name="edit_employee_name" required value="<?php echo   isset($editData['employee_name']) ? htmlspecialchars($editData['employee_name']) : ''; ?>">
                            </div>
                            <div class="form-group half-width">
                                <label >* Email</label>
                                <input type="email" name="edit_email"  required value="<?php echo $editData ? htmlspecialchars($editData['email']) : ''; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group half-width">
                                <label >* Số điện thoại</label>
                                <input type="text" name="edit_phone" required value="<?php echo $editData ? htmlspecialchars($editData['phone']) : ''; ?>"></input>
                            </div>
                            <div class="form-group half-width">
                                <label >* Địa chỉ</label>
                                <input type="text" name="edit_address_nv" required value="<?php echo $editData ? htmlspecialchars($editData['address_nv']) : ''; ?>"></input>
                            </div>
                        </div>


                        

                        <div class="form-row">
                            <div class="form-group half-width">
                                <label >* Phân quyền</label>
                                <input type="text" name="edit_position" required value="<?php echo $editData ? htmlspecialchars($editData['position']) : ''; ?>">
                            </div>
                            <div class="form-group half-width">
                                <label for="end_time">* Ngày vào làm</label>
                                <input type="date" name="edit_hire_date" required value="<?php echo $editData ? htmlspecialchars($editData['hire_date']) : ''; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group half-width">
                                <label for="end_time">* Tiền lương</label>
                                <input type="number" name="edit_salary" required value="<?php echo $editData ? htmlspecialchars($editData['salary']) : ''; ?>">
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <button class="submit-btn" id="addMovieBtn" name ="editemployee">Cập nhật</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    

    <!-- Sửa phim -->
    <script src="../js/admin.js"></script>

    
</body>
</html>